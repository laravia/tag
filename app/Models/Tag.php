<?php

namespace Laravia\Tag\App\Models;

use Laravia\Heart\App\Models\Model;
use Orchid\Screen\AsSource;

class Tag extends Model
{
    use AsSource;
    protected $fillable = [
        'name',
        'slug',
        'type',
        'order_column',
    ];

}
