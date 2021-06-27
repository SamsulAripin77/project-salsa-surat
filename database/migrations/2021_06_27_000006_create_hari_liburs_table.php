<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHariLibursTable extends Migration
{
    public function up()
    {
        Schema::create('hari_liburs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tgl')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
