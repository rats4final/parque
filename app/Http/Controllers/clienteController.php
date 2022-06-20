<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class clienteController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //

        $cliente=$request->all();

         $cliente=request()->except('_token');

         $cliente['password']=Hash::make($request['password']);

         $Nivel=['id_rol' => '2'];

        $cliente= array_merge($Nivel, $cliente);

        User::create($cliente);

        Session::flash('Registro_de_users','cliente registrado');

        return redirect('/factura/create');




    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
