<?php

namespace App\Http\Controllers;

use App\Models\Depreciacion;
use App\Http\Requests\StoreDepreciacionRequest;

class DepreciacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depreciaciones = [];
        return view('depreciaciones.ver', compact("depreciaciones"));
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
     * @param  \App\Http\Requests\StoreDepreciacionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepreciacionRequest $request)
    {
        $depreciaciones = Depreciacion::All()->sortBy('fecha_depreciacion');
        $depreciaciones = $depreciaciones->where('fecha_depreciacion', $request->fecha . '-01');
        return view('depreciaciones.ver', compact("depreciaciones"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Depreciacion  $depreciacion
     * @return \Illuminate\Http\Response
     */
    public function edit(Depreciacion $depreciacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\StoreDepreciacionRequest  $request
     * @param  \App\Models\Depreciacion  $depreciacion
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDepreciacionRequest $request, Depreciacion $depreciacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Depreciacion  $depreciacion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Depreciacion $depreciacion)
    {
        //
    }
}
