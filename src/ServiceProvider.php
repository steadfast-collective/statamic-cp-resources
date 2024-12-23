<?php

namespace SteadfastCollective\StatamicCpResources;

use Statamic\Facades\CP\Nav;
use Statamic\Facades\Permission;
use Statamic\Providers\AddonServiceProvider;
use Statamic\Statamic;

class ServiceProvider extends AddonServiceProvider
{
    protected $routes = [
        'cp' => __DIR__.'/../routes/cp.php',
    ];

    protected $vite = [
        'input' => [
            'resources/css/addon.css',
        ],
        'publicDirectory' => 'resources/dist',
    ];

    public function boot()
    {
        parent::boot();

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'statamic-cp-resources');

        Statamic::booted(function () {
            Nav::extend(function ($nav) {
                $nav->content(config('statamic.cp-resources.nav.title', 'Resources'))
                    ->section(config('statamic-cp-resources.nav.section', 'Steadfast'))
                    ->route('cp-resources.index')
                    ->icon('pin')
                    ->can('view resources');
            });

            Permission::register('view resources')
                ->label('View Resources');
        });
    }
}
