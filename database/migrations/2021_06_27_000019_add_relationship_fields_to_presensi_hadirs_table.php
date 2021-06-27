<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPresensiHadirsTable extends Migration
{
    public function up()
    {
        Schema::table('presensi_hadirs', function (Blueprint $table) {
            $table->unsignedBigInteger('userid_id')->nullable();
            $table->foreign('userid_id', 'userid_fk_4256475')->references('id')->on('users');
        });
    }
}
