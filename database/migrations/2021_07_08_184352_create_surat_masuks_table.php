<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratMasuksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('tgl_surat')->nullable();
            $table->string('no_surat')->nullable();
            $table->string('pengirim')->nullable();
            $table->string('lampiran')->nullable();
            $table->string('hal')->nullable();
            $table->unsignedBigInteger('kategori_id');
            $table->string('alamat')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_masuks');
    }
}
