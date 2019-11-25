<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Usuario;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use DB;

class UsuarioController extends Controller
{
    //

    public function index(Request $request)
    {
        //
        if($request){

            $sql=trim($request->get('buscarTexto'));
            $usuarios=DB::table('usuarios as users')
            ->join('roles','users.rol_id','=','roles.id')
            ->select('users.id','users.nombre',
            'users.email','users.password','users.rol_id','roles.nombre as rol')
            ->where('users.nombre','LIKE','%'.$sql.'%')
            ->orderBy('users.id','desc')
            ->paginate(5);

             /*listar los roles en ventana modal*/
            $roles=DB::table('roles')
            ->select('id','nombre')->get(); 

            return view('usuario.index',["usuarios"=>$usuarios,"roles"=>$roles,"buscarTexto"=>$sql]);
        
            //return $usuarios;
        }      

       
    }

    public function store(Request $request)
    {
        //
        $usuario= new Usuario();
        $usuario->nombre = $request->nombre;
        $usuario->email = $request->email;
        $usuario->password = bcrypt( $request->password);
        $usuario->rol_id = $request->id;  

            $usuario->save();
            return Redirect::to("usuario"); 
    }

    public function update(Request $request)
    {
        //
        
        $user= Usuario::findOrFail($request->id_usuario);
        $user->nombre = $request->nombre;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->rol_id = $request->id;   

          $user->save();
          return Redirect::to("usuario");
    }


    public function destroy(Request $request)
    {
        try{
            $usuario= Usuario::findOrFail($request->id_usuario)->delete();
            return Redirect::to("usuario")->with("success","usuario eliminado con exito");
        } catch  (\Illuminate\Database\QueryException $e){
            return Redirect::to("usuario")->with("danger","No se puede eliminar este registro porque esta asociado con otra asignación");
        }
    }
}
