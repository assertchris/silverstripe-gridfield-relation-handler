<?php

namespace Firesphere\GridFieldRelationHandler\Tests;

use Firesphere\GridFieldRelationHandler\GridFieldManyRelationHandlerManyManyList;
use SilverStripe\Dev\SapphireTest;

class GridFieldManyRelationHandlerManyManyListTest extends SapphireTest
{
    protected $usesDatabase = true;

    public function testCreateGridFieldManyRelationHandlerManyManyList()
    {
        $gridFieldManyRelationHandlerManyManyList = new GridFieldManyRelationHandlerManyManyList();

        $this->assertNotNull($gridFieldManyRelationHandlerManyManyList);
    }
}
