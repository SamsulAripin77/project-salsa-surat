<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToJadwalsTable extends Migration
{
    public function up()
    {
        Schema::table('jadwals', function (Blueprint $table) {
            $table->unsignedBigInteger('id_shift_id')->nullable();
            $table->foreign('id_shift_id', 'id_shift_fk_4256455')->references('id')->on('shifts');
        });
    }
}
