<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKeterangansTable extends Migration
{
    public function up()
    {
        Schema::create('keterangans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama')->nullable();
            $table->string('kode')->nullable();
            $table->decimal('denda', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
