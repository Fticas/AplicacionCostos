<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Magnitud;

class MagnitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $editable = true;
        $magnitud = Magnitud::All();
        return view("magnitud.ver", compact("magnitud", "editable"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $editable = false;
        $magnitud = Magnitud::All();
        return view("magnitud.crear", compact("magnitud", "editable"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $magnitud = new Magnitud();
        $magnitud->nombre = $request->nombre;
        $magnitud->save();
        return redirect()->route('crear_magnitud');
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
        $magnitud = Magnitud::find($id);
        return view('magnitud.editar', compact("magnitud"));
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
        $magnitud = Magnitud::find($id);
        $magnitud->nombre = $request->nombre;
        $magnitud->update();
        return redirect()->route('ver_magnitud');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $magnitud = Magnitud::find($id);
        $magnitud->delete();
        return redirect()->route('ver_magnitud');
    }
}
