<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresensiHadirsTable extends Migration
{
    public function up()
    {
        Schema::create('presensi_hadirs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('checktime')->nullable();
            $table->string('koordinat')->nullable();
            $table->string('work_code')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
