<?php

use Illuminate\Database\Seeder;

class CartelesUAG extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sucursal=new App\sucursal(["nombre"=>"Instituto de Ciencias Biológicas UAG","sobrenombre"=>"ICB-UAG"]);
        $sucursal->save();
        $sucursal=new App\sucursal(["nombre"=>"Area Clínica UAG, Hospital Dr Ángel Leaño",
        	"sobrenombre"=>"Ángel Leaño"]);
        $sucursal->save();

        $cartel=new App\cartel(["titulo"=>"Los carteles con títulos largos siempre se ven mejor, incluso aunque puedan llegar a ser redundantes", 
        	"autores"=>"Luis::2477387;;Joaquín::1234567",
        	"resumen"=>"tincidunt arcu non sodales neque sodales ut etiam sit amet nisl purus in mollis nunc sed id semper risus in hendrerit gravida rutrum quisque non tellus orci ac auctor augue mauris augue neque gravida in fermentum et sollicitudin ac orci phasellus egestas tellus rutrum tellus pellentesque eu tincidunt tortor aliquam nulla facilisi cras fermentum odio eu feugiat pretium nibh ipsum consequat nisl vel pretium lectus quam id leo in vitae turpis massa sed elementum tempus egestas sed sed risus pretium quam vulputate dignissim suspendisse in est ante in nibh mauris cursus mattis molestie a iaculis at erat pellentesque adipiscing commodo elit at imperdiet dui accumsan sit amet nulla facilisi morbi tempus iaculis urna id volutpat lacus laoreet non curabitur gravida arcu ac tortor dignissim convallis aenean et tortor at risus viverra adipiscing at in tellus integer feugiat scelerisque varius morbi enim nunc faucibus a pellentesque sit amet porttitor eget dolor morbi non arcu risus quis varius quam quisque id diam vel quam elementum pulvinar etiam non quam lacus suspendisse faucibus interdum posuere lorem ipsum dolor sit amet consectetur adipiscing elit duis tristique sollicitudin nibh sit amet commodo nulla facilisi nullam vehicula ipsum a arcu cursus vitae congue mauris rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas maecenas pharetra convallis posuere morbi leo urna molestie at elementum eu facilisis sed odio morbi quis commodo odio aenean sed adipiscing diam donec adipiscing tristique risus nec feugiat in fermentum posuere",
        	"colaboradores"=>"primer colaborador::1234567;;segundo colaborador::3456789",
        	"supervisores"=>"Dr Luis Manuel Murillo Bonilla::8798456",
        	"sucursal_id"=>1,
        	"pdfaddress"=>"fghjkl"
        ]);
        $cartel->save();
    }
}
