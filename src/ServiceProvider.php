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

    public function boot()
    {
        parent::boot();

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'statamic-cp-resources');

        Statamic::booted(function () {
            Nav::extend(function ($nav) {
                $nav->content('Resources')
                    ->section(config('statamic-cp-resources.nav.title', 'steadfast'))
                    ->route('cp-resources.index')
                    ->icon('pin')
                    ->can('view '.config('statamic-cp-resources.nav.title', 'Steadfast').' resources');
            });

            Permission::register('view '.config('statamic-cp-resources.nav.title', 'Steadfast').' resources')
                ->label('View '.config('statamic-cp-resources.nav.title', 'Steadfast').' Resources');
        });
    }
}
