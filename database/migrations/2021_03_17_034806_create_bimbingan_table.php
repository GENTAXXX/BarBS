<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBimbinganTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bimbingan', function (Blueprint $table) {
            $table->id('id');
            $table->string('catatan');
            $table->date('tgl_bimbingan');
            $table->unsignedBigInteger('mhs_id');
            $table->unsignedBigInteger('dosen_id');
            $table->unsignedBigInteger('magang_id')->nullable();
            $table->timestamps();
        });

        Schema::table('bimbingan', function ($table) {
            $table->foreign('mhs_id')->references('id')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('dosen_id')->references('id')->on('dosen')->onDelete('cascade');
            $table->foreign('magang_id')->references('id')->on('magang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bimbingan');
    }
}
