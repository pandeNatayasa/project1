<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbKasirsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_kasirs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_identitas',50);
            $table->string('nama',50);
            $table->string('alamat',100);
            $table->enum('jenis_kelamin',['laki-laki','perempuan']);
            $table->string('email',50);
            $table->string('password');
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
        Schema::dropIfExists('tb_kasirs');
    }
}
