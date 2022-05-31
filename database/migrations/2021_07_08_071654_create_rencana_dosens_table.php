<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRencanaDosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rencana_dosens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('kegiatan_id');
            $table->unsignedBigInteger('indikator_id');
            $table->unsignedBigInteger('tugas_id');
            $table->unsignedTinyInteger('target');
            $table->string('semester');
            $table->string('tahun_akademik');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('kegiatan_id')->references('id')->on('kegiatans');
            $table->foreign('indikator_id')->references('id')->on('indikators');
            $table->foreign('tugas_id')->references('id')->on('tugas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rencana_dosens');
    }
}
