<?php

Route::get('model-log', function () {
    $logs = \KamrulHaque\LaravelModelLog\Models\Log::with('activity')->latest()->paginate(5);

    return view('laravel-model-log::model-log', compact('logs'));
})->name('model.log');
