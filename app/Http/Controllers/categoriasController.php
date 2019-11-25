<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Categoria;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use DB;
Use Exception;
use Auth;

class categoriasController extends Controller
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
            $categorias = DB::table('categorias as c')

                ->select('c.id', 'c.nombre')
                ->where('c.nombre', 'LIKE', '%' . $sql . '%')
                ->orderBy('c.id', 'desc')
                ->paginate(5);


            return view('categorias.index', ["categorias" => $categorias, "buscarTexto" => $sql]);

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
        $categorias = new Categoria();
        $categorias->nombre = $request->nombre;

        //Handle File Upload


        $categorias->save();
        return Redirect::to("categorias");
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
        $categorias = Categoria::findOrFail($request->id_categorias);
        $categorias->nombre = $request->nombre;


        $categorias->save();
        return Redirect::to("categorias");
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
            $categorias = Categoria::findOrFail($request->id_categorias)->delete();
            return Redirect::to("categorias")->with("success","Categoria eliminado con exito");
        } catch  (\Illuminate\Database\QueryException $e){
            return Redirect::to("categorias")->with("danger","No se puede eliminar este registro porque esta asociado con otra asignación");
        }
    }
}