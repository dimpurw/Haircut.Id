<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barber', function (Blueprint $table) {
            $table->id();
            $table->integer('barbershop_id');
            $table->string('foto');
            $table->string('nama_barber', 50);
            $table->string('email', 30);
            $table->string('alamat');
            $table->char('nomortelepon', 16);
            $table->string('keahlian', 16);
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
        Schema::dropIfExists('barber');
    }
}
