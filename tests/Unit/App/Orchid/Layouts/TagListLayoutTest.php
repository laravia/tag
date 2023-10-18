<?php

namespace Laravia\Tag\Tests\Unit\App\Orchid\Layouts;

use Laravia\Tag\App\Orchid\Layouts\TagListLayout;
use Laravia\Heart\App\Classes\TestCase;

class TagListLayoutTest extends TestCase
{

    public $class = 'Laravia\Tag\App\Orchid\Layouts\TagListLayout';

    public function testInitClass()
    {
        $this->assertClassExist($this->class);
    }

    public function testColumnsExist()
    {
        $this->assertMethodInClassExists('columns', TagListLayout::class);
    }
    public function testColumns()
    {
        $this->assertIsArray((new TagListLayout)->columns());
    }
}
