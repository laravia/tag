<?php

namespace Laravia\Tag\Tests\Unit\App;

use Laravia\Heart\App\Classes\TestCase;
use Laravia\Tag\App\Tag;
use Spatie\Tags\Tag as TagsTag;

class TagTest extends TestCase
{
    public function testInitClass()
    {
        $this->assertClassExist(Tag::class);
    }

    public function testGetTagsFromOrchidTagAsArray()
    {
        $this->assertIsArray(Tag::getSpatieTagsFromOrchidRequest(['test1', 'test2']));
    }

    public function testGetTagsFromOrchidTagAsArrayWithNewAndOld()
    {
        $tagText[] = 'test1';
        $tagText[] = 'test2';
        $tagText[] = 'test3';
        $tagText[] = 'test4';
        $tags[] = TagsTag::findOrCreate($tagText[0])->id;
        $tags[] = TagsTag::findOrCreate($tagText[1])->id;
        $tags[] = $tagText[2];
        $tags[] = $tagText[3];
        $tags = Tag::getSpatieTagsFromOrchidRequest($tags);

        $this->assertNotContains([1, 2], $tags);
        $this->assertContains($tagText[0], $tags);
        $this->assertContains($tagText[1], $tags);
        $this->assertContains($tagText[2], $tags);
        $this->assertContains($tagText[3], $tags);
    }}
