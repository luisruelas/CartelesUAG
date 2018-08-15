<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRespuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("comentario_id")->unsigned();
            $table->string("user_id")->nullable();
            $table->string("name")->nullable();
            $table->string("email")->nullable();
            $table->text("comentario");
            $table->timestamps();

            $table->foreign("comentario_id")->references("id")->on("comentarios");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('respuestas');
    }
}
