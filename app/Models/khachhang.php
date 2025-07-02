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
    protected $fillable = ['username', 'password', 'mail'];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
