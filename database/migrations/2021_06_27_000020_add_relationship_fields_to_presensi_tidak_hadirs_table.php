<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPresensiTidakHadirsTable extends Migration
{
    public function up()
    {
        Schema::table('presensi_tidak_hadirs', function (Blueprint $table) {
            $table->unsignedBigInteger('id_pegawai_id')->nullable();
            $table->foreign('id_pegawai_id', 'id_pegawai_fk_4256504')->references('id')->on('users');
            $table->unsignedBigInteger('keterangan_id')->nullable();
            $table->foreign('keterangan_id', 'keterangan_fk_4256505')->references('id')->on('keterangans');
        });
    }
}
