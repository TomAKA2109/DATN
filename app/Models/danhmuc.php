<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class danhmuc extends Model
{
    protected $table = 'danhmuc';
    protected $fillable = ['tendanhmuc', 'thutu', 'anhdaidien'];
}

