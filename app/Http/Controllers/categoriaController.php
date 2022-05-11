<?php

namespace App\Http\Contcategorialers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categoriaModelo;

class categoriaContcategorialer extends Controller
{
    public function index()

    {
        //
        $categoria=categoriaModelo::all();

        return view('admin.categoria.index',compact('categoria'));

    }

    public function create()
    {
        //


        return view('admin.categoria.create');

    }

    public function store(Request $request)
    {
        //


        //categoriaModelo::create($request->all());

         $categoria=$request->all();

         $categoria=request()->except('_token');

         categoriaModelo::create($categoria);

         return redirect('/categoria');
    

       //return $categoria;

    }

    public function show($id_categoria)
    {
        //

        $categoria = categoriaModelo::find($id_categoria);

        return view('admin.categoria.show',compact('categoria'));

    }

    public function edit($id_categoria)
    {
        //

        $categoria = categoriaModelo::find($id_categoria);

        return view('admin.categoria.edit',compact('categoria'));

    }

    public function update(Request $request, $id_categoria)
    {
        //

        $categoria = categoriaModelo::find($id_categoria);

        $input = $request->all();

        $categoria->update($input);

        return redirect('/categoria');

    }

    public function destroy($id_categoria)
    {
        //

        categoriaModelo::destroy($id_categoria);

        return redirect('/categoria');

    }
}
