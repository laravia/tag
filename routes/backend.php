<?php

use Illuminate\Support\Facades\Route;
use Laravia\Tag\App\Orchid\Screens\TagEditScreen;
use Laravia\Tag\App\Orchid\Screens\TagScreen;
use Tabuna\Breadcrumbs\Trail;

$prefix = config('platform.prefix');

Route::middleware(['web', 'auth', 'platform'])->group(function () use ($prefix) {

    Route::screen($prefix . '/tags', TagScreen::class)
        ->name('laravia.tag.list')
        ->breadcrumbs(function (Trail $trail) {
            return $trail
                ->parent('platform.index')
                ->push('Tag');
        });

    Route::screen($prefix . '/tag/{tag?}', TagEditScreen::class)
        ->name('laravia.tag.edit')
        ->breadcrumbs(fn (Trail $trail) => $trail
            ->parent('laravia.tag.list')
            ->push(__('Tag edit or create'), route('laravia.tag.list')));

});
