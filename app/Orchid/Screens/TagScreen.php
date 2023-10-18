<?php

namespace Laravia\Tag\App\Orchid\Screens;

use Illuminate\Http\Request;
use Laravia\Tag\App\Models\Tag as ModelsTag;
use Laravia\Tag\App\Orchid\Layouts\TagListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class TagScreen extends Screen
{

    public function query(): iterable
    {
        return [
            'tags' => ModelsTag::orderByDesc('id')->paginate(),
        ];
    }

    public function name(): ?string
    {
        return 'Tag Screen';
    }

    public function description(): ?string
    {
        return 'Tags of Laravia';
    }

    public function commandBar(): iterable
    {
        return [
            Link::make('Create new tag')
                ->icon('pencil')
                ->route('laravia.tag.edit')
        ];
    }

    public function layout(): iterable
    {
        return [
            TagListLayout::class
        ];
    }

    public function remove(Request $request): void
    {
        ModelsTag::findOrFail($request->get('id'))->delete();

        Alert::info('You have successfully deleted the tag.');
    }
}
