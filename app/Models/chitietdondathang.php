<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class chitietdondathang extends Model
{
    protected $table='chitietdonhang';

    public function sach() {
        return $this->belongsTo(sach::class, 'id_sach', 'id');
    }
}
