<?php

namespace Firesphere\GridFieldRelationHandler\Tests;

use Firesphere\GridFieldRelationHandler\GridFieldManyRelationHandler;
use SilverStripe\Dev\SapphireTest;

class GridFieldManyRelationHandlerTest extends SapphireTest
{
    protected $usesDatabase = true;

    public function testCreateGridFieldManyRelationHandler()
    {
        $gridFieldManyRelationHandler = new GridFieldManyRelationHandler();

        $this->assertNotNull($gridFieldManyRelationHandler);
    }
}
