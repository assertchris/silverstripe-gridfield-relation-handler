<?php

namespace Firesphere\GridFieldRelationHandler\Tests;

use Firesphere\GridFieldRelationHandler\GridFieldHasOneRelationHandler;
use SilverStripe\Dev\SapphireTest;

class GridFieldRelationHandlerTest extends SapphireTest
{
    protected $usesDatabase = true;

    public function testCreateGridFieldRelationHandler()
    {
        $gridFieldRelationHandler = new GridFieldHasOneRelationHandler(
            FakePage::create(),
            'FakeDataObject'
        );

        $this->assertNotNull($gridFieldRelationHandler);
    }

    public function testGetAndSetColumnTitle()
    {
        $gridFieldRelationHandler = new GridFieldHasOneRelationHandler(
            FakePage::create(),
            'FakeDataObject'
        );

        $gridFieldRelationHandler->setColumnTitle('Equality');

        $this->assertEquals('Equality', $gridFieldRelationHandler->getColumnTitle());
    }
}
