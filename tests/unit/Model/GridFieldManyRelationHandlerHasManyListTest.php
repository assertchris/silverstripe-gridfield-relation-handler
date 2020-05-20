<?php

namespace Firesphere\GridFieldRelationHandler\Tests;

use Firesphere\GridFieldRelationHandler\GridFieldManyRelationHandlerHasManyList;
use SilverStripe\Dev\SapphireTest;

class GridFieldManyRelationHandlerHasManyListTest extends SapphireTest
{
    protected $usesDatabase = true;

    public function testCreateGridFieldManyRelationHandlerHasManyList()
    {
        $gridFieldManyRelationHandlerHasManyList = new GridFieldManyRelationHandlerHasManyList();

        $this->assertNotNull($gridFieldManyRelationHandlerHasManyList);
    }
}
