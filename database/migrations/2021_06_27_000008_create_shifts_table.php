<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftsTable extends Migration
{
    public function up()
    {
        Schema::create('shifts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_shift');
            $table->time('checkin')->nullable();
            $table->time('checkout')->nullable();
            $table->time('smsin')->nullable();
            $table->time('smsout')->nullable();
            $table->string('is_over_time')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
