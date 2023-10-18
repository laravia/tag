<?php

namespace Laravia\Tag\Tests\Unit\App;

use Laravia\Tag\App\Models\Tag;
use Laravia\Heart\App\Classes\TestCase;

class TagModelTest extends TestCase
{
    public function testInitClass()
    {
        $this->assertClassExist(Tag::class);
    }

    public function testCreateTag()
    {
        $name = json_encode(['en' => $this->faker->name]);
        $slug = json_encode(['en' => $this->faker->slug]);
        $type = $this->faker->word;
        $order_column = $this->faker->randomDigit;

        Tag::create([
            'name' => $name,
            'slug' => $slug,
            'type' => $type,
            'order_column' => $order_column,
        ]);

        $this->assertDatabaseCount('tags', 1);
    }
}
