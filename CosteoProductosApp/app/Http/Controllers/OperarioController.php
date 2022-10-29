<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Operario;

class OperarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $operarios = Operario::All();
        return view('operarios.ver', compact("operarios"));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $operarios = new Operario;
        $operarios->nombre = $request->nombre;
        $operarios->apellido = $request->apellido;
        $operarios->carnet = $request->carnet;
        $operarios->precio_hora = $request->precio_hora;
        $operarios->save();
        return redirect()->route('operarios.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $operarios = Operario::find($id);
        return view('operarios.editar', compact("operarios"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $operario = Operario::find($id);
        $operario->nombre = $request->nombre;
        $operario->apellido = $request->apellido;
        $operario->carnet = $request->carnet;
        $operario->precio_hora = $request->precio_hora;
        $operario->save();
        return redirect()->route('operarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
