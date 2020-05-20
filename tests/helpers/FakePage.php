<?php

namespace Firesphere\GridFieldRelationHandler\Tests;

use Page;

class FakePage extends Page
{
    private static $has_one = [
        'FakeDataObject' => FakeDataObject::class,
    ];
}
