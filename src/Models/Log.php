<?php

namespace KamrulHaque\LaravelModelLog\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Log extends Model
{
    protected $guarded = [];
    protected $with = ['user'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->user_id = auth()->user()->id;
        });
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(config('auth.providers.users.model'), 'user_id');
    }

    public function getCreatedAtAttribute($value): ?string
    {
        if ($value)
            return Carbon::parse($value)->format('h:ia, Y-m-d');
        else
            return null;
    }

    public function loggable(): MorphTo
    {
        return $this->morphTo();
    }

    public function activity(): hasOne
    {
        return $this->hasOne(Activity::class);
    }
}
