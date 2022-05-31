<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaporanTendiksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_tendiks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rencana_tendik_id');
            $table->date('tanggal');
            $table->string('kegiatan');
            $table->unsignedTinyInteger('jumlah');
            $table->timestamps();

            $table->foreign('rencana_tendik_id')->references('id')->on('rencana_tendiks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_tendiks');
    }
}
