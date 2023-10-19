<?php

namespace Laravia\Tag\Tests\Unit\Classes\Traits;

use Laravia\Heart\App\Classes\TestCase;
use Laravia\Tag\App\Traits\HasTags;

class HasTagsTest extends TestCase
{
    public function testInitClass()
    {
        $this->assertTraitExist(HasTags::class);
    }
}
