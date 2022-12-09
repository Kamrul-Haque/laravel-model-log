<?php

Route::get('model-logs', function () {
    $logs = \KamrulHaque\LaravelModelLog\Models\Log::with('activity')->latest()->paginate(5);

    return view('laravel-model-log::index', compact('logs'));
})->name('model.logs');
