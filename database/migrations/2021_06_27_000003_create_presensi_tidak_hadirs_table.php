<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresensiTidakHadirsTable extends Migration
{
    public function up()
    {
        Schema::create('presensi_tidak_hadirs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('cdate')->nullable();
            $table->string('keterangan_lanjut')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
