<?php

namespace Firesphere\GridFieldRelationHandler;

use SilverStripe\ORM\HasManyList;
use SilverStripe\ORM\RelationList;

class GridFieldManyRelationHandlerHasManyList extends HasManyList
{
    public function __construct()
    {
    }

    public function getForeignKey(HasManyList $on = null)
    {
        if (!$on) {
            return;
        }

        return $on->foreignKey;
    }

    public function getForeignIDFilter(RelationList $on = null)
    {
        if (!$on) {
            return;
        }

        return $on->foreignIDFilter();
    }
}
