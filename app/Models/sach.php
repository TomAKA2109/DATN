<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class sach extends Model
{
    protected $attributes = [
        'luotxem' => 0,
        'luotmua' => 0,
    ];
    protected $table = 'sach';

    public function loaisach()
    {
        return $this->belongsTo('App\loaisach');
    }

    public function chitietsach()
    {
        return $this->hasOne(chitietsach::class, 'masach', 'id')->withDefault();
    }
}
