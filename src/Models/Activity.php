<?php

namespace KamrulHaque\LaravelModelLog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Activity extends Model
{
    protected $guarded = [];
    protected $casts = ['before_change' => 'array', 'after_change' => 'array'];

    public function log(): BelongsTo
    {
        return $this->belongsTo(Log::class);
    }
}
