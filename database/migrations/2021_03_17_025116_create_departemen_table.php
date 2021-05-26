<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartemenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departemen', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->string('nama')->unique();
            $table->string('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->integer('NIDN')->nullable();
            $table->string('foto')->nullable()->default('avatar.png');
            $table->timestamps();
        });

        Schema::table('departemen', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departemen');
    }
}
