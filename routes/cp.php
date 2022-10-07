<?php

use Illuminate\Support\Facades\Route;
use SteadfastCollective\StatamicCpResources\Http\Controllers\ResourcesController;

Route::prefix('steadfast')->name('steadfast.')->group(function () {
    Route::get('resources', ResourcesController::class)->name('resources');
});
