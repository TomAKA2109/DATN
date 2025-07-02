<?php

namespace App\Models;

use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class khachhang extends Authenticatable
{
    protected $table='khachhang';
    public $timestamps = true;
    public $attributes = [
        'ten' => '',
        'sdt' => '',
        'diachi' => ''
    ];
    protected $fillable = ['username', 'password', 'mail', 'sdt', 'ten','diachi'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
