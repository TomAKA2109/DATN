<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveRequiredGhiChuInDondathang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dondathang', function (Blueprint $table) {
            $table->text('ghichu')->nullable()->change();
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
            $table->text('ghichu')->nullable(false)->change(); // quay lại bắt buộc
        });
    }
}
