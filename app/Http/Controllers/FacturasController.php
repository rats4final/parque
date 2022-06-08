<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class FacturasController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        //

        return view('admin.factura.create');


    }


    public function store(Request $request)
    {
        //

        $usuario=$request->all();


        $usuario=request()->except('_token');


        QrCode::format('svg')->size(500)->generate($usuario['name'] . $usuario['apellido'] , '../public/storage/qrcodes/nose.svg');



        return 'se logro';

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
