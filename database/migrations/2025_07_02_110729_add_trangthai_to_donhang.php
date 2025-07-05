<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTrangthaiToDonhang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::table('dondathang', function (Blueprint $table) {
            $table->integer('trangthai')->default(0); // thay 'ten_cot_truoc_do' nếu cần
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dondathang', function (Blueprint $table) {
            $table->dropColumn('trangthai');
        });
    }
}
