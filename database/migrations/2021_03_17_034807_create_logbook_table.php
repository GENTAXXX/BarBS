<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogbookTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logbook', function (Blueprint $table) {
            $table->id('id');
            $table->date('tanggal')->nullable();
            $table->string('kegiatan')->nullable();
            $table->string('deskripsi_log')->nullable();
            $table->string('saran')->nullable();
            $table->unsignedBigInteger('magang_id')->nullable();
            $table->unsignedBigInteger('spv_id')->nullable();
            $table->unsignedBigInteger('mhs_id')->nullable();
            $table->timestamps();
        });

        Schema::table('logbook', function ($table) {
            $table->foreign('magang_id')->references('id')->on('magang')->onDelete('cascade');
            $table->foreign('spv_id')->references('id')->on('supervisor')->onDelete('cascade');
            $table->foreign('mhs_id')->references('id')->on('mahasiswa')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logbook');
    }
}
