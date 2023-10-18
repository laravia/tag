<?php

$config['tag']['links'] = [
    [
        'name' => 'Tag',
        'icon' => 'bs.tag',
        'route' => 'laravia.tag.list',
        'sort' => 10000
    ]
];

$config['tag']['call'] = [
    'php artisan vendor:publish --provider="Spatie\Tags\TagsServiceProvider" --tag="tags-migrations"',
    'php artisan migrate',
];
