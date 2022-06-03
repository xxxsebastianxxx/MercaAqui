<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\producto;

class productosController extends Controller
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
        return view('productos.index', ['producto'=>producto::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validData=$request->validate(['Nombre_producto'=>'required|min:5|max:30']);
        $validData=$request->validate(['Descripcion'=>'required|min:5|max:100']);
        $validData=$request->validate(['Cantidad'=>'required|numeric']);
        $validData=$request->validate(['Precio'=>'required|numeric']);
        $validData=$request->validate(['Imagen'=>'required']);
        $nuevoproducto= new producto();
        $imagen=$request->file('Imagen');
        $nombreimg=time().'.'.$imagen->getClientOriginalExtension();
        $destino=public_path('images');
        $request->Imagen->move($destino, $nombreimg);
        $nuevoproducto->Nombre_producto=$request->get('Nombre_producto');
        $nuevoproducto->Descripcion=$request->get('Descripcion');
        $nuevoproducto->cantidad=$request->get('Cantidad');
        $nuevoproducto->Precio=$request->get('Precio');
        $nuevoproducto->imagen=$nombreimg;
        $nuevoproducto->save();
        return redirect('/productos');
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
        $producto = producto::find($id);
        return view('productos.edit', ['producto'=>$producto]);
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
        $validData=$request->validate(['Nombre_producto'=>'required|min:5|max:30']);
        $validData=$request->validate(['Descripcion'=>'required|min:5|max:100']);
        $validData=$request->validate(['Imagen'=>'required|']);
        $validData=$request->validate(['Cantidad'=>'required|numeric']);
        $validData=$request->validate(['Precio'=>'required|numeric']);
        $validData=$request->validate(['Imagen'=>'required']);
        $producto=producto::find($id);
        $imagen=$request->file('Imagen');
        $nombreimg=time().'.'.$imagen->getClientOriginalExtension();
        $destino=public_path('images');
        $request->Imagen->move($destino, $nombreimg);
        $producto->Nombre_producto=$request->get('Nombre_producto');
        $producto->Descripcion=$request->get('Descripcion');
        $producto->cantidad=$request->get('Cantidad');
        $producto->Precio=$request->get('Precio');
        $producto->imagen=$nombreimg;
        $producto->save();
        return redirect('/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto=producto::findOrFail($id);
        $producto->delete();
        return redirect('/productos');
    }
    public function drop($id)
    {
        $producto=producto::findOrFail($id);
        return view('productos.borrar', ['producto'=>$producto]);
    }
}
