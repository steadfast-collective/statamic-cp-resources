<?php

namespace SteadfastCollective\StatamicCpResources\Http\Controllers;

use Inertia\Inertia;
use Statamic\Facades\User;
use Statamic\Http\Controllers\CP\CpController;

class ResourcesController extends CpController
{
    public function __invoke()
    {
        if (! User::current()->can('view resources')) {
            abort(403);
        }
        return Inertia::render('statamic-cp-resources::Index', [
            'title' => config('statamic-cp-resources.nav.title', 'Training'),
            'externalUrl' => config('statamic-cp-resources.external_url', 'https://trello.com/b/uLZV3PP0/issue-reporting-client'),
            'externalName' => config('statamic-cp-resources.external_name', 'Trello'),
            'embeds' => config('statamic-cp-resources.embeds'),
            'embedsTitle' => config('statamic-cp-resources.embeds_title', 'Embeds'),
            'embedsIcon' => config('statamic-cp-resources.embeds_icon', 'movie-video-clip'),
            'additionalResources' => config('statamic-cp-resources.additional_resources'),
            'additionalResourcesTitle' => config('statamic-cp-resources.additional_resources_title', 'Additional Resources'),
            'additionalResourcesIcon' => config('statamic-cp-resources.additional_resources_icon', 'link'),
        ]);
    }
}
