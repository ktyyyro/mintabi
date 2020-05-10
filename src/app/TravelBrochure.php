<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class TravelBrochure extends Model
{
    protected $fillable = [
        'destination',
        'user_id',
        'execution_date',
        'travel_items',
        'image_paths',
        'remark',
    ];

    public function members(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'travel_brochures_users', 'travel_brochures_id', 'user_id');
    }
}
