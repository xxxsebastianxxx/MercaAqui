<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ventas;
use App\Models\producto;
use Illuminate\Support\Facades\DB;

class ventasController extends Controller
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

        $sql3 =DB::select("SELECT SUM(Precio_total) as Precio_final FROM ventas");
        $cantidadTotal =DB::select("SELECT id,Nombre_producto from productos where cantidad <> 0 ");
        return view('ventas.create', ['ventas'=>ventas::all(),'producto'=>$cantidadTotal,"sql3"=>$sql3[0]->Precio_final]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $producto=producto::all();
        // dd($producto);
        return view('ventas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $producto = $request -> get('id_producto');
        $resta = $request -> get('Cantidad');
        $sql1 =DB::select("SELECT Precio FROM productos WHERE id = $producto ");
        $sql2 =DB::select("SELECT Nombre_producto FROM productos WHERE id = $producto ");
        $sql5 =DB::select("SELECT Cantidad FROM  productos WHERE id = $producto ");

       // $validData=$request->validate(['Nombre_producto'=>'required']);
        $validData=$request->validate(['Cantidad'=>'required']);

        if ($resta <= ($sql5[0]->Cantidad)) {
            $sql4 =DB::select("UPDATE productos SET Cantidad = Cantidad - $resta WHERE id =  $producto ");

            $nuevoproducto= new ventas();
            $nuevoproducto->id_producto=$request->get('id_producto');
            $nuevoproducto->Nombre_producto=$sql2[0]->Nombre_producto;
            $nuevoproducto->Cantidad=$request->get('Cantidad');
            $nuevoproducto->Precio=$sql1[0]->Precio;
            $nuevoproducto->Precio_total=$request->get('Cantidad')*$sql1[0]->Precio;
            $nuevoproducto->save();
            return redirect('/ventas');
        } else {
            echo'<script type="text/javascript">
            alert("no hay stock");
            window.location.href="/ventas";
            </script>';
        }
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
        $editar =ventas::find($id);
        return view(' ventas.edit ', ['editar'=>$editar,]);
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

        $editproducto=ventas::find($id);
        $Precio=$editproducto->Precio;
        $Nombre=$editproducto->Nombre_producto;
        $id_producto=$editproducto->id_producto;
        $cantidad_actual=($editproducto->Cantidad); //cantidad de ventas
        $cantidad_def=intval($request->get('Cantidad')); // cantidad del input
        $sql5= DB::select("SELECT Cantidad FROM productos WHERE id = $id_producto"); // cantidad de productos

        if ($cantidad_def <=($sql5[0]->Cantidad + $cantidad_actual)) {
            $sql18 = DB::select("update productos set Cantidad = (Cantidad + $cantidad_actual) where id = $id_producto");
            $editproducto->Cantidad=$request->get('Cantidad');
            $sql19 = DB::select("update productos set Cantidad = (Cantidad - $cantidad_def) where id = $id_producto");
            $editproducto->Precio_total=$request->get('Cantidad')*$Precio;
            $editproducto->save();
            return redirect('/ventas');
        }else{
                // dd('soy la gaver');
                echo'<script>alert("No hay stock de '. $Nombre .' ");window.location.href="/ventas";</script>';

            }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

        public function destroy($id)

        {
            $id=2;

            $deleteproducto=ventas::all();
            $sql13=DB::select("delete from ventas");
            $id_ventas =DB::select("SELECT UNIX_TIMESTAMP(now()) as hola");

            $hello ='<script>alert("Codigo para verificar su recibo '. $id_ventas[0]->hola .' ");window.location.href="/ventas";</script>';
                echo$hello;


        }
}
