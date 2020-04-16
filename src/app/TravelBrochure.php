<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;


class TravelBrochure extends Model
{
    protected $fillable = [
        'destination',
        'memberlist_id',
        'execution_date',
        'belongings',
        'remark',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Role', 'role_user_table', 'user_id', 'role_id');
    }
}
