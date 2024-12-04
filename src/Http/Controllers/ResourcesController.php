<?php

namespace SteadfastCollective\StatamicCpResources\Http\Controllers;

use Statamic\Facades\User;
use Statamic\Http\Controllers\CP\CpController;

class ResourcesController extends CpController
{
    public function __invoke()
    {
        if (! User::current()->can('view resources')) {
            abort(403);
        }

        return view('statamic-cp-resources::index', [
            'externalUrl' => config('statamic-cp-resources.external_url', 'https://trello.com/b/uLZV3PP0/issue-reporting-client'),
            'externalName' => config('statamic-cp-resources.external_name', 'Trello'),
            'looms' => config('statamic-cp-resources.looms'),
            'additionalResources' => config('statamic-cp-resources.additional_resources'),
        ]);
    }
}
