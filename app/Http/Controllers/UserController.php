<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{

    public function index()
    {
        //
        $usuario=User::all();

        return view('admin.user.index',compact('usuario'));


        //return $usuario;


    }


    public function create()
    {
        //
        return view('admin.user.create');
    }


    public function store(Request $request)
    {
        //
        $usuario=$request->all();

         $usuario=request()->except('_token');

         $usuario['password']=Hash::make($request['password']);

         $Nivel=['id_rol' => '1'];

        $usuario= array_merge($Nivel, $usuario);

        User::create($usuario);

        Session::flash('Registro_de_users','Usuario registrado');

        return redirect('/user');


        //return $usuario;
    }


    public function show($id_users)
    {
        //

        $user = User::find($id_users);

        return view('admin.user.show',compact('user'));
    }


    public function edit($id_users)
    {
        //
        $user = User::find($id_users);

        return view('admin.user.edit',compact('user'));
    }


    public function update(Request $request, $id_users)
    {
        //
        $user = User::find($id_users);

        $input = $request->all();

        $user->update($input);

        return redirect('/user');

    }


    public function destroy($id_users)
    {
        //
        User::destroy($id_users);

        return redirect('/user');
    }
}
