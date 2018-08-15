<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComentariosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("cartel_id")->unsigned();
            $table->string("user_id")->nullable();
            $table->string("nombre")->nullable();
            $table->string("email")->nullable();
            $table->text("comentario");
            $table->timestamps();

            $table->foreign("cartel_id")->references("id")->on("cartels");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
}
