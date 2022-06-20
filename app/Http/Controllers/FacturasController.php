<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;
use App\Models\Servicios;
use Carbon\Carbon;
use illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\User;
class FacturasController extends Controller
{

    public function index()
    {
        $facturas= Factura::get();
        return view('admin.factura.index',compact('facturas'));
    }


    public function create()
    {
        $clientes = User::all();
        $servicios = Servicios::get();

        $ultima_id = Factura::max('id_factura');
        //dd($ultima_id);
        return view('admin.factura.create',compact('servicios','clientes','ultima_id'));

    }


    public function store(Request $request)
    {
       $factura = Factura::create($request->all()+['user'=> Auth::user()->id_users]);

        foreach ($request->id_servicio as $key => $servicio) {
            $results[] = array("servicios_id_servicio"=>$request->id_servicio[$key],
            "cantidad"=>$request->cantidad[$key],"precio_unitario"=>$request->precio_unitario[$key]
            ,"descuento"=>$request->descuento[$key]);
        }

        $factura->detalleFactura()->createMany($results);
        return redirect()->route('factura.index');


        // return $factura;



       /* $usuario=$request->all();
        $usuario=request()->except('_token');
        return 'se logro';

        comentado de momento
        */

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
