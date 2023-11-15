<?php

use Illuminate\Support\Facades\Route;
use Thoughtco\StatamicCpResources\Http\Controllers\ResourcesController;

Route::name('cp-resources.')->group(function () {
    Route::get('resources', ResourcesController::class)->name('index');
});
