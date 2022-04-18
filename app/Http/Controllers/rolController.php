<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rolModelo;


class rolController extends Controller
{

    public function index()

    {
        //
        $rol=rolModelo::all();

        return view('admin.rol.index',compact('rol'));

    }

    public function create()
    {
        //


        return view('admin.rol.create');

    }

    public function store(Request $request)
    {
        //

        $rol=request()->except('_token');

        rolModelo::create($rol);

        return redirect('/rol');

    }

    public function show($id_rol)
    {
        //

        $rol = rolModelo::find($id_rol);

        return view('admin.rol.show',compact('rol'));

    }

    public function edit($id_rol)
    {
        //

        $rol = rolModelo::find($id_rol);

        return view('admin.rol.edit',compact('rol'));

    }

    public function update(Request $request, $id_rol)
    {
        //

        $rol = rolModelo::find($id_rol);

        $input = $request->all();

        $rol->update($input);

        return redirect('/rol');

    }

    public function destroy($id_rol)
    {
        //

        rolModelo::destroy($id_rol);

        return redirect('/rol');

    }
}
