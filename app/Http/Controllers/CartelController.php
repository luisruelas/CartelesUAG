<?php

namespace App\Http\Controllers;

use App\cartel;
use App\Comentario;
use App\sucursal;
use Illuminate\Http\Request;
use Response;
use Illuminate\Support\Facades\Storage;

class CartelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("carteles.indexcartel")->with(["carteles"=>cartel::all(),"comentarios"=>Comentario::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sucursales=sucursal::pluck("sobrenombre","id")->toArray();
        return view("carteles.createcartel")->with(compact(["sucursales"]));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $array=$request->toArray();
        $cartel=new cartel();
        dd($cartel->addCartel($array));
        return redirect("/");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\cartel  $cartel
     * @return \Illuminate\Http\Response
     */
    public function show(cartel $cartel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\cartel  $cartel
     * @return \Illuminate\Http\Response
     */
    public function edit(cartel $cartel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\cartel  $cartel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, cartel $cartel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\cartel  $cartel
     * @return \Illuminate\Http\Response
     */
    public function destroy(cartel $cartel)
    {
        //
    }
    public function downloadCartel($id)
    {
        //PDF file is stored under project/public/download/info.pdf
        $cartel=cartel::where("id",$id)->first();
        $file= Storage::get(asset($cartel->pdfaddress));

        $headers = array(
                  'Content-Type: application/pdf',
                );

        return Response::download($file, $cartel->titulo.'.pdf', $headers);
    }
}
