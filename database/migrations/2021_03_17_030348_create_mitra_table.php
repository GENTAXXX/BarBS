<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMitraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mitra', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id');
            $table->string('nama');
            $table->string('alamat')->unique()->nullable();
            $table->string('telepon')->unique()->nullable();
            $table->string('fax')->unique()->nullable();
            $table->string('foto')->nullable()->default('avatar.png');
            $table->unsignedBigInteger('kab_id')->nullable();
            $table->timestamps();
        });

        Schema::table('mitra', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kab_id')->references('id')->on('kabupaten');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mitra');
    }
}
