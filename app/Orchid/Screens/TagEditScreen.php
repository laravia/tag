<?php

namespace Laravia\Tag\App\Orchid\Screens;

use Illuminate\Http\Request;
use Laravia\Tag\App\Models\Tag as ModelsTag;
use Orchid\Screen\Fields\Input;
use Orchid\Support\Facades\Layout;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Alert;

class TagEditScreen extends Screen
{
    public $tag;

    public function query(ModelsTag $tag): array
    {
        return [
            'tag' => $tag
        ];
    }

    public function name(): ?string
    {
        return $this->tag->exists ? 'Edit tag' : 'Creating a new tag';
    }

    public function description(): ?string
    {
        return "Tags";
    }

    public function commandBar(): array
    {
        return [
            Button::make('Create tag')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee(!$this->tag->exists),

            Button::make('Update')
                ->icon('pencil')
                ->method('createOrUpdate')
                ->canSee($this->tag->exists),

            Button::make('Remove')
                ->icon('trash')
                ->method('remove')
                ->canSee($this->tag->exists),
        ];
    }

    public function layout(): array
    {
        return [
            Layout::columns([
                Layout::rows([
                    Input::make('tag.name')
                        ->title('Name')
                        ->placeholder('Name')
                        ->required(),
                    Input::make('tag.slug')
                        ->title('Slug')
                        ->placeholder('Slug')
                        ->required(),
                ]),

                Layout::rows([
                    Input::make('tag.type')
                        ->title('Type')
                        ->placeholder('Type')
                        ->required(),

                    Input::make('tag.order_column')
                        ->title('Order Column')
                        ->placeholder('Order Column')
                        ->required(),
                ]),
            ]),
        ];
    }

    public function createOrUpdate(Request $request)
    {
        $this->tag->fill($request->get('tag'))->save();

        Alert::info('You have successfully created a tag.');

        return redirect()->route('laravia.tag');
    }

    public function remove()
    {
        $this->tag->delete();

        Alert::info('You have successfully deleted the tag.');

        return redirect()->route('laravia.tag.list');
    }
}
