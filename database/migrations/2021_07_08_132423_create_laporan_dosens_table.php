<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanDosensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_dosens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rencana_dosen_id');
            $table->date('tanggal');
            $table->unsignedTinyInteger('jumlah');
            $table->timestamps();

            $table->foreign('rencana_dosen_id')->references('id')->on('rencana_dosens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_dosens');
    }
}
