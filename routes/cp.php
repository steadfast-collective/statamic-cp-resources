<?php

use Illuminate\Support\Facades\Route;
use SteadfastCollective\StatamicCpResources\Http\Controllers\ResourcesController;

Route::prefix(config('statamic-cp-resources.nav.prefix', 'steadfast'))->name(config('statamic-cp-resources.nav.name', 'steadfast.'))->group(function () {
    Route::get('resources', ResourcesController::class)->name('resources');
});
