<?php

namespace App\Http\Controllers;

use App\Models\Servicios;
use App\Models\categoriaModelo;
use App\Http\Requests\StoreServiciosRequest;
use App\Http\Requests\UpdateServiciosRequest;

class ServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servicios = Servicios::get();

        // return $servicios;
        return view('admin.servicio.index',compact('servicios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = categoriaModelo::get();
        return view('admin.servicio.create',compact('categorias'));//los enviamos
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiciosRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiciosRequest $request)
    {
        if ($request->has('picture')) { //procesamos la imagen y le damos un nombre custom
            $file= $request->file('picture');
            $image_name = time().'-'.$file->getClientOriginalName();
            $file->move(public_path("/image"),$image_name);
        }
        Servicios::create($request->all()+[
            'imagen_servicio'=>$image_name //este array contiene el nombre de la imagen
        ]);

        return redirect()->route('servicio.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Servicios  $servicios
     * @return \Illuminate\Http\Response
     */
    public function show(Servicios $servicios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Servicios  $servicios
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicios $servicios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiciosRequest  $request
     * @param  \App\Models\Servicios  $servicios
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiciosRequest $request, Servicios $servicios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Servicios  $servicios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicios $servicios)
    {
        //
    }
}
