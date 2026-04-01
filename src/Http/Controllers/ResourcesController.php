<?php

namespace SteadfastCollective\StatamicCpResources\Http\Controllers;

use Inertia\Inertia;
use Statamic\Facades\Addon;
use Statamic\Facades\User;
use Statamic\Http\Controllers\CP\CpController;

class ResourcesController extends CpController
{
    public function __invoke()
    {
        if (! User::current()->can('view resources')) {
            abort(403);
        }

        $settings = Addon::get('steadfast-collective/statamic-cp-resources')->settings();

        return Inertia::render('statamic-cp-resources::Index', [
            'title'                    => $settings->get('nav_title', config('statamic-cp-resources.nav.title', 'Training')),
            'externalUrl'              => $settings->get('external_url', config('statamic-cp-resources.external_url')),
            'externalName'             => $settings->get('external_name', config('statamic-cp-resources.external_name')),
            'embeds'                   => $settings->get('embeds', config('statamic-cp-resources.embeds', [])),
            'embedsTitle'              => $settings->get('embeds_title', config('statamic-cp-resources.embeds_title', 'Embeds')),
            'embedsIcon'               => $settings->get('embeds_icon', config('statamic-cp-resources.embeds_icon', 'movie-video-clip')),
            'additionalResources'      => $settings->get('additional_resources', config('statamic-cp-resources.additional_resources', [])),
            'additionalResourcesTitle' => $settings->get('additional_resources_title', config('statamic-cp-resources.additional_resources_title', 'Additional Resources')),
            'additionalResourcesIcon'  => $settings->get('additional_resources_icon', config('statamic-cp-resources.additional_resources_icon', 'link')),
        ]);
    }
}
