<?php

namespace App\Http\Controllers;

use App\Models\Depreciacion;
use App\Http\Requests\StoreDepreciacionRequest;
use App\Http\Requests\UpdateDepreciacionRequest;

class DepreciacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $depreciaciones = Depreciacion::All()->sortBy('fecha_depreciacion');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Depreciacion  $depreciacion
     * @return \Illuminate\Http\Response
     */
    public function show(Depreciacion $depreciacion)
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
     * @param  \App\Http\Requests\UpdateDepreciacionRequest  $request
     * @param  \App\Models\Depreciacion  $depreciacion
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDepreciacionRequest $request, Depreciacion $depreciacion)
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
