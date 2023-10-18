<?php

namespace Laravia\Tag\App;

use Spatie\Tags\Tag as TagsTag;

class Tag
{
    public static function getSpatieTagsFromOrchidRequest($tags = [])
    {
        $tags = collect($tags)->map(function ($tag) {
            if (preg_match('/^\d+$/', $tag)) {
                $tag = TagsTag::where('id', $tag)->first()->name;
            }
            return $tag;
        })->toArray();
        return $tags;
    }
}
