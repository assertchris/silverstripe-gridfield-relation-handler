<?php

namespace Firesphere\GridFieldRelationHandler;

use SilverStripe\ORM\ManyManyList;
use SilverStripe\ORM\RelationList;

class GridFieldManyRelationHandlerManyManyList extends ManyManyList
{
    public function __construct()
    {
    }

    public function getJoinTable(ManyManyList $on = null)
    {
        if (!$on) {
            return;
        }

        return $on->joinTable;
    }

    public function getLocalKey(ManyManyList $on = null)
    {
        if (!$on) {
            return;
        }

        return $on->localKey;
    }

    public function getForeignKey(ManyManyList $on = null)
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
