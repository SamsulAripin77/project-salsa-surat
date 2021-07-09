<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeluarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('tgl_surat')->nullable();
            $table->string('no_surat')->nullable();
            $table->string('penanggug_jawab')->nullable();
            $table->string('penerima')->nullable();
            $table->string('lampiran')->nullable();
            $table->string('hal')->nullable();
            $table->unsignedBigInteger('kategori_id');
            $table->string('alamat')->nullable();
            $table->string('keterangan')->nullable();
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
        Schema::dropIfExists('surat_keluars');
    }
}
