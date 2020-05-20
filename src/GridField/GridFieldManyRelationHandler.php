<?php

namespace Firesphere\GridFieldRelationHandler;

use \InvalidArgumentException;
use SilverStripe\Forms\GridField\GridField;
use SilverStripe\Forms\GridField\GridField_DataManipulator;
use SilverStripe\ORM\DataList;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\HasManyList;
use SilverStripe\ORM\ManyManyList;
use SilverStripe\ORM\RelationList;
use SilverStripe\ORM\SS_List;
use SilverStripe\View\ArrayData;

class GridFieldManyRelationHandler extends GridFieldRelationHandler implements GridField_DataManipulator
{
    protected $cheatList;
    protected $cheatManyList;

    public function __construct($useToggle = true, $segement = 'before')
    {
        parent::__construct($useToggle, $segement);
        $this->cheatList = new GridFieldManyRelationHandlerHasManyList();
        $this->cheatManyList = new GridFieldManyRelationHandlerManyManyList();
    }

    public function getColumnContent($gridField, $record, $columnName)
    {
        $list = $gridField->getList();
        if (!$list instanceof RelationList) {
            user_error(
                'GridFieldManyRelationHandler requires the GridField to have a RelationList. ' .
                    'Got a ' . get_class($list) . ' instead.',
                E_USER_WARNING
            );
        }

        $state = $this->getState($gridField);
        $checked = in_array($record->ID, $state->RelationVal->toArray());
        $field = ['Checked' => $checked, 'Value' => $record->ID, 'Name' => $this->relationName($gridField)];
        if ($list instanceof HasManyList) {
            $key = $record->{$this->cheatList->getForeignKey($list)};
            if ($key && !$checked) {
                $field['Disabled'] = true;
            }
        }
        $field = ArrayData::create($field);

        return $field->renderWith('Firesphere/GridFieldRelationHandler/GridFieldManyRelationHandlerItem');
    }

    public function getManipulatedData(GridField $gridField, SS_List $list)
    {
        if (!$list instanceof RelationList) {
            user_error(
                'GridFieldManyRelationHandler requires the GridField to have a RelationList. ' .
                    'Got a ' . get_class($list) . ' instead.',
                E_USER_WARNING
            );
        }

        $state = $this->getState($gridField);

        // We don't use setupState() as we need the list
        if ($state->FirstTime) {
            $state->RelationVal = array_values($list->getIdList()) ?: [];
        }
        if (!$state->ShowingRelation && $this->useToggle) {
            return $list;
        }

        $query = clone $list->dataQuery();

        try {
            $query->removeFilterOn($this->cheatList->getForeignIDFilter($list));
        } catch (InvalidArgumentException $e) { /* NOP */
        }
        $orgList = $list;
        $list = DataList::create($list->dataClass());
        $list = $list->setDataQuery($query);

        if ($orgList instanceof ManyManyList) {
            $joinTable = $this->cheatManyList->getJoinTable($orgList);
            $baseClass = DataObject::getSchema()->baseDataClass($list->dataClass());
            $baseTable = DataObject::getSchema()->tableName($baseClass);
            $localKey = $this->cheatManyList->getLocalKey($orgList);
            $query->leftJoin($joinTable, "\"$joinTable\".\"$localKey\" = \"$baseTable\".\"ID\"");
            $list = $list->setDataQuery($query);
        }

        return $list;
    }

    protected function relationName(GridField $gridField)
    {
        return $gridField->getName() . get_class($gridField->getList());
    }

    protected function cancelGridRelation(GridField $gridField, $arguments, $data)
    {
        parent::cancelGridRelation($gridField, $arguments, $data);

        $state = $this->getState($gridField);
        $state->RelationVal = array_values($gridField->getList()->getIdList()) ?: [];
    }

    protected function saveGridRelation(GridField $gridField, $arguments, $data)
    {
        $state = $this->getState($gridField);
        $gridField->getList()->setByIdList($state->RelationVal->toArray());
        parent::saveGridRelation($gridField, $arguments, $data);
    }
}
