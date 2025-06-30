<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SetLuotxemLuotMuaBang0 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sach', function($table) {
            $table->integer('luotmua')->default(0)->change();
            $table->integer('luotxem')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sach', function (Blueprint $table) {
            $table->integer('luotxem')->removeDefault(); // khôi phục lại nếu rollback
            $table->integer('luotmua')->removeDefault(); // khôi phục lại nếu rollback
        });
    }
}
