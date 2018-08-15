<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCartelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartels', function (Blueprint $table) {
            $table->increments('id');
            $table->text("titulo");
            $table->text("autores");
            $table->text("resumen");
            $table->text("colaboradores")->nullable();
            $table->text("supervisores")->nullable();
            $table->integer("sucursal_id")->unsigned();
            $table->string("pdfaddress")->nullable();
            $table->string("imageaddress")->nullable();
            $table->timestamps();

            $table->foreign("sucursal_id")->references("id")->on("sucursals");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cartels');
    }
}
