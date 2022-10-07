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
                    ->section('Steadfast')
                    ->route('steadfast.resources')
                    ->icon('pin')
                    ->can('view steadfast resources');
            });

            Permission::register('view steadfast resources')
                ->label('View Steadfast Resources');
        });
    }
}
