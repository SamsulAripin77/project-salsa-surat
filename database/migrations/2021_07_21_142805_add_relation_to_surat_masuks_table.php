<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationToSuratMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('surat_masuks', function (Blueprint $table) {
            $table->foreign('kategori_id','kategori_fk_23334223242')->references('id')->on('kategoris')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id','user_fk_2334342342')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('surat_masuks', function (Blueprint $table) {
            //
        });
    }
}
