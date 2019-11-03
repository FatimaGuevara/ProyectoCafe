<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Subcategoria;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use DB;
Use Exception;
use Auth;

class SubcategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request) {

            $sql = trim($request->get('buscarTexto'));
            $subcategorias = DB::table('subcategorias as p')
                ->join('categorias as c', 'p.categoria_id', '=', 'c.id')
                ->select('p.id', 'p.categoria_id', 'p.nombre', 'p.descripcion', 'p.imagen', 'c.nombre as categoria')
                ->where('p.nombre', 'LIKE', '%' . $sql . '%')
                ->orderBy('p.id', 'desc')
                ->paginate(5);

            /*listar las categorias en ventana modal*/
            $categorias = DB::table('categorias')
                ->select('id', 'rol_id', 'nombre')->get();

            return view('subcategoria.index', ["subcategorias" => $subcategorias, "categorias" => $categorias, "buscarTexto" => $sql]);

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
        $subcategoria = new Subcategoria();
        $subcategoria->categoria_id = $request->id;
        $subcategoria->nombre = $request->nombre;
        $subcategoria->descripcion = $request->descripcion;

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
            $path = $request->file('imagen')->storeAs('public/img/subcategoria', $fileNameToStore);
        } else {
            $fileNameToStore = "noimagen.jpg";
        }
        $subcategoria->imagen = $fileNameToStore;

        $subcategoria->save();
        return Redirect::to("subcategoria");


    
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
    public function update(Request $request, $id)
    {
        $subcategoria = Subcategoria::findOrFail($request->id_subcategoria);
        $subcategoria->categoria_id = $request->id;
        $subcategoria->nombre = $request->nombre;
        $subcategoria->descripcion = $request->descripcion;

        //Handle File Upload
        if ($request->hasFile('imagen')) {

            /*si la imagen que subes es distinta a la que está por defecto 
                    entonces eliminaría la imagen anterior, eso es para evitar 
                    acumular imagenes en el servidor*/
            if ($subcategoria->imagen != 'noimagen.jpg') {
                Storage::delete('public/img/subcategoria/' . $subcategoria->imagen);
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
            $path = $request->file('imagen')->storeAs('public/img/subcategoria', $fileNameToStore);
        } else {
            $fileNameToStore = $subcategoria->imagen;
        }
        $subcategoria->imagen = $fileNameToStore;

        $subcategoria->save();
        return Redirect::to("subcategoria");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{
            $subcategoria = Subcategoria::findOrFail($request->id_subcategoria)->delete();
            return Redirect::to("subcategoria")->with("success","subcategoria eliminada con exito");
        } catch  (\Illuminate\Database\QueryException $e){
            return Redirect::to("subcategoria")->with("danger","No se puede eliminar este registro porque esta asociado con otra asignación");
        }
    }
}
