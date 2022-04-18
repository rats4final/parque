<?php

namespace App\Http\Controllers;

use App\Models\Atraccion;
use App\Http\Requests\StoreAtraccionRequest;
use App\Http\Requests\UpdateAtraccionRequest;

class AtraccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAtraccionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAtraccionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Atraccion  $atraccion
     * @return \Illuminate\Http\Response
     */
    public function show(Atraccion $atraccion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Atraccion  $atraccion
     * @return \Illuminate\Http\Response
     */
    public function edit(Atraccion $atraccion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAtraccionRequest  $request
     * @param  \App\Models\Atraccion  $atraccion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAtraccionRequest $request, Atraccion $atraccion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Atraccion  $atraccion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Atraccion $atraccion)
    {
        //
    }
}
