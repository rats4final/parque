<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\usuario_opera_servicioModelo;
use App\Models\Servicios;
use App\Models\User;

class usuario_opera_servicioController extends Controller
{
    public function index()
    {
        
        $usuario_opera_servicio = usuario_opera_servicioModelo::with('users','servicio')->get();
       return view ('admin.usuario_opera_servicio.index',compact('usuario_opera_servicio'));
       //return $usuario_opera_servicio;
    }
    
    public function create()
    {
        $users =User::get();
        $servicio =Servicios::get();
       return view('admin.usuario_opera_servicio.create',compact('users','servicio'));
       //return $carro;
    }
  
    public function store(Request $request)
    {

        $input = $request->all();
        usuario_opera_servicioModelo::create($input);
        return redirect('/usuario_opera_servicio')->with('flash_message', 'usuario_opera_servicio Addedd!');  
        //return $input;
    }
    
    public function show($id)
    {
        $usuario_opera_servicio = usuario_opera_servicioModelo::find($id);
        return view('admin.usuario_opera_servicio.show')->with('usuario_opera_servicio', $usuario_opera_servicio);
    }
    
    public function edit($id)
    {
        //$prueba = User::all();
        $users =User::get();
        $servicio =Servicios::get();
        $usuario_opera_servicio = usuario_opera_servicioModelo::with('users','servicio')->find($id);
        //$usuario_opera_servicio = usuario_opera_servicioModelo::find($id);
        return view('admin.usuario_opera_servicio.edit', compact('users','servicio'));
    }
  
    public function update(Request $request, $id)
    {
        $usuario_opera_servicio = usuario_opera_servicioModelo::find($id);
        $input = $request->all();
        $usuario_opera_servicio->update($input);
        return redirect('/usuario_opera_servicio')->with('flash_message', 'usuario_opera_servicio Updated!');  
    }
  
    public function destroy($id)
    {
        usuario_opera_servicioModelo::destroy($id);
        return redirect('/usuario_opera_servicio')->with('flash_message', 'usuario_opera_servicio deleted!');  
    }
}
