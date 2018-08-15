<?php

use Illuminate\Database\Seeder;
use App\cartel;
use App\Comentario;
use App\Respuesta;
class Comentariosreplies extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment=new Comentario(["nombre"=>"luis","email"=>"luise.ruelasz@gmail.com","comentario"=>"Este es el primer comentario a un cartel","cartel_id"=>"1"]);
        $comment->save();
    }
}
