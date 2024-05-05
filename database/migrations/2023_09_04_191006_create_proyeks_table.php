<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProyeksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proyeks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('produk_id');
            $table->foreign('produk_id')->references('id')->on('produks');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('nama_proyek')->nullable();
            $table->string('nama_pelanggan')->nullable();
            $table->string('telp')->nullable();
            $table->string('lokasi')->nullable();
            $table->integer('harga_jual')->nullable();
            $table->integer('modal')->nullable();
            $table->integer('keuntungan')->nullable();
            $table->string('detail')->nullable();
            $table->integer('bar_progress')->nullable();
            $table->enum('status',['onproses','finish'])->nullable();
            $table->string('galeri1')->nullable();
            $table->string('galeri2')->nullable();
            $table->string('galeri3')->nullable();
            $table->string('galeri4')->nullable();
            $table->string('galeri5')->nullable();
            $table->string('galeri6')->nullable();
            $table->string('galeri7')->nullable();
            $table->string('galeri8')->nullable();
            $table->string('galeri9')->nullable();
            $table->string('galeri10')->nullable();
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
        Schema::dropIfExists('proyeks');
    }
}
