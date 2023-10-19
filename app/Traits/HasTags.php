<?php

namespace Laravia\Tag\App\Traits;

use ArrayAccess;
use Laravia\Heart\App\Laravia;
use Laravia\Tag\App\Tag;
use Spatie\Tags\HasTags as TagsHasTags;

trait HasTags
{
    use TagsHasTags;

    public function saveTags(array | null | ArrayAccess $tags, string | null $type = null, string $languageKey): static
    {
        if (!empty($tags)) {
            $className = static::getTagClassName();

            $tags = Tag::getSpatieTagsFromOrchidRequest($tags);

            $tags = collect($className::findOrCreate($tags, $type));

            $newTags = [];
            foreach ($tags as $tag) {
                foreach (Laravia::getDataFromConfigByKey('languages') as $languageKey => $language) {
                    $tag->setTranslation('name', $languageKey, $tag->name);
                    $tag->save();
                    $newTags[] = $tag->fresh();
                }
            }
            $tags = collect($newTags);
            $this->syncTagIds($tags->pluck('id')->toArray(), $type);
        }
        return $this;
    }
}
