<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Producto;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use DB;
Use Exception;
use Auth;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request) {

            $sql = trim($request->get('buscarTexto'));
            $productos = DB::table('productos as p')
                ->join('subcategorias as c', 'p.subcategoria_id', '=', 'c.id')
                ->select('p.id', 'p.subcategoria_id', 'p.nombre', 'p.precio', 'p.descripcion', 'p.imagen', 'c.nombre as subcategoria')
                ->where('p.nombre', 'LIKE', '%' . $sql . '%')
                ->orderBy('p.id', 'desc')
                ->paginate(5);

            /*listar las categorias en ventana modal*/
            $subcategorias = DB::table('subcategorias')
                ->select('id', 'categoria_id', 'nombre', 'imagen', 'descripcion')->get();

            return view('producto.index', ["productos" => $productos, "subcategorias" => $subcategorias, "buscarTexto" => $sql]);

        }
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
        //
        $producto = new Producto();
        $producto->subcategoria_id = $request->id;
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;

        //Handle File Upload
        if ($request->hasFile('imagen')) {
            //Get filename with the extension
            $filenamewithExt = $request->file('imagen')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('imagen')->guessClientExtension();
            //FileName to store
            $fileNameToStore = time() . '.' . $extension;
            //Upload Image
            $path = $request->file('imagen')->storeAs('public/img/producto', $fileNameToStore);
        } else {
            $fileNameToStore = "noimagen.jpg";
        }
        $producto->imagen = $fileNameToStore;

        $producto->save();
        return Redirect::to("producto");
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $producto = Producto::findOrFail($request->id_producto);
        $producto->subcategoria_id = $request->id;
        $producto->nombre = $request->nombre;
        $producto->precio = $request->precio;
        $producto->descripcion = $request->descripcion;

        //Handle File Upload
        if ($request->hasFile('imagen')) {

            /*si la imagen que subes es distinta a la que está por defecto 
                    entonces eliminaría la imagen anterior, eso es para evitar 
                    acumular imagenes en el servidor*/
            if ($producto->imagen != 'noimagen.jpg') {
                Storage::delete('public/img/producto/' . $producto->imagen);
            }
            //Get filename with the extension
            $filenamewithExt = $request->file('imagen')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('imagen')->guessClientExtension();
            //FileName to store
            $fileNameToStore = time() . '.' . $extension;
            //Upload Image
            $path = $request->file('imagen')->storeAs('public/img/producto', $fileNameToStore);
        } else {
            $fileNameToStore = $producto->imagen;
        }
        $producto->imagen = $fileNameToStore;

        $producto->save();
        return Redirect::to("producto");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        try{
            $producto = Producto::findOrFail($request->id_producto)->delete();
            return Redirect::to("producto")->with("success","Producto eliminado con exito");
        } catch  (\Illuminate\Database\QueryException $e){
            return Redirect::to("producto")->with("danger","No se puede eliminar este registro porque esta asociado con otra asignación");
        }
    }
}
