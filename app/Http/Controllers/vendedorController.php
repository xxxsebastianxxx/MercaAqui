<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vendedor;
use App\Models\User;
use App\Models\venta;

class vendedorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('vendedores.index', ['user'=>user::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vendedores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validaciones=$request->validate([
            'nombrenv'=>'required|',
            'emailnv'=>'required|',
            'contraseñanv'=>'required',
        ]);


        $nuevovendedor= new user();
        $nuevovendedor->name=$request->get('nombrenv');
        $nuevovendedor->email=$request->get('emailnv');
        $nuevovendedor->email=$request->get('contraseñanv');
        $nuevovendedor->save();
        return redirect('/vendedores');
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
        $editar =user::find($id);
        return view(' vendedores.edit ', ['editar'=>$editar]);
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
        $validaciones=$request->validate([ 'nombree'=>'required|']);
        $validaciones=$request->validate([ 'emaile'=>'required|']);
        $editar=user::find($id);
        $editar->name=$request->get('nombree');
        $editar->email=$request->get('emaile');
        $editar->save();
        return redirect('/vendedores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $eliminar=user::findOrFail($id);
        $eliminar->delete();
        return redirect('/vendedores');
    }
    public function drop($id)
    {
        $eliminarv=user::findOrFail($id);
        return view('vendedores.borrar', ['eliminar'=>$eliminarv]);
    }
}
