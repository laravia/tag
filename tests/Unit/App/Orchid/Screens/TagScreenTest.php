<?php

namespace Laravia\Tag\Tests\Unit\App\Orchid\Screens;

use Laravia\Heart\App\Classes\TestCase;
use Laravia\Heart\App\Classes\TestScreenCaseTrait;
use Laravia\Tag\App\Orchid\Screens\TagScreen;

class TagScreenTest extends TestCase
{

    use TestScreenCaseTrait;
    public function getScreenTestClass()
    {
        return new TagScreen();
    }

}
