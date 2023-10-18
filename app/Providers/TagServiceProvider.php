<?php

namespace Laravia\Tag\App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravia\Heart\App\Traits\ServiceProviderTrait;

class TagServiceProvider extends ServiceProvider
{
    use ServiceProviderTrait;

    protected $name = "tag";

    public function boot(): void
    {
        $this->defaultBootMethod();
    }
}
