<?php

namespace Thoughtco\StatamicCpResources\Http\Controllers;

use Statamic\Facades\User;
use Statamic\Http\Controllers\CP\CpController;

class ResourcesController extends CpController
{
    public function __invoke()
    {        
        if (! User::current()->can('view '.strtolower(config('thoughtco.client-dashboard.nav.title')))) {
            abort(403);
        }

        return view('statamic-cp-resources::index', [
            'trelloUrl' => config('statamic-cp-resources.trello_url'),
            'looms' => config('statamic-cp-resources.looms'),
            'additionalResources' => config('statamic-cp-resources.additional_resources'),
        ]);
    }
}
