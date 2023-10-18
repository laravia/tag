<?php

namespace Laravia\Tag\App\Orchid\Layouts;

use Laravia\Tag\App\Models\Tag;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\TD;
use Orchid\Screen\Layouts\Table;

class TagListLayout extends Table
{
    public $target = 'tags';

    public function columns(): array
    {
        return [

            TD::make('name', 'Name')->sort(),
            TD::make('slug', 'Slug')->sort(),
            TD::make('type', 'Type')->sort(),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Tag $tag) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([

                        Link::make(__('Edit'))
                            ->route('laravia.tag.edit', $tag->id)
                            ->icon('bs.pencil'),

                        Button::make(__('Delete'))
                            ->icon('bs.trash3')
                            ->confirm(__('Once the tag entry is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.'))
                            ->method('remove', [
                                'id' => $tag->id,
                            ]),
                    ]))
        ];
    }
}
