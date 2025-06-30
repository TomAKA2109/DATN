<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class chitietsach extends Model
{
    protected $table = 'chitietsach'; // nếu bạn chưa có
    protected $primaryKey = 'masach'; // đây là dòng cần thêm

    public $incrementing = false; // nếu masach không phải kiểu số tự tăng
    protected $keyType = 'string';
}
