<?php

namespace Laravia\Tag\Tests\Features\App\Orchid\Screens;

use Laravia\Heart\App\Classes\TestCase;

class TagScreenFeatureTest extends TestCase
{

    public function test_tag_screen_can_be_rendered()
    {
        $this->actAsAdmin();
        $response = $this->get(route('laravia.tag.list'));
        $response->assertOk();
    }

}
