<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use DB;

class UserController extends Controller
{
    //
    public function index(Request $request)
    {
        //
        if($request){

            $sql=trim($request->get('buscarTexto'));
            $usuarios=DB::table('users')
            ->join('roles','users.rol_id','=','roles.id')
            ->select('users.id','users.nombre','users.usuario',
            'users.email','users.password','users.rol_id','roles.nombre as rol')
            ->where('users.nombre','LIKE','%'.$sql.'%')
            ->orderBy('users.id','desc')
            ->paginate(3);

             /*listar los roles en ventana modal*/
            $roles=DB::table('roles')
            ->select('id','nombre')->get(); 

            return view('user.index',["usuarios"=>$usuarios,"roles"=>$roles,"buscarTexto"=>$sql]);
        
            //return $usuarios;
        }      

       
    }

    public function store(Request $request)
    {
        //
       
        $user= new User();
        $user->nombre = $request->nombre;
        $user->usuario = $request->usuario;
        $user->email = $request->email;
        $user->password = bcrypt( $request->password);
        $user->rol_id = $request->id;  
        
            $user->save();
            return Redirect::to("user"); 
    }

    public function create(Request $request)
    {
        //
        $this->validate($request, [
            'nombre'     =>  'required',
            'usuario'  =>  'required',
            'email'     =>  'required',
            'password'  =>  'required',
            'id' =>  'required'
           ]);
      
           $user= new User();
           $user->nombre = $request->nombre;
           $user->usuario = $request->usuario;
           $user->email = $request->email;
           $user->password = bcrypt( $request->password);
           $user->rol_id = $request->id;  
           
               $user->save();
               return Redirect::to("/"); 
    }

    public function update(Request $request)
    {
        //
        
        $user= User::findOrFail($request->id_usuario);
        $user->nombre = $request->nombre;
        $user->usuario = $request->usuario;
        $user->email = $request->email;
        $user->password = bcrypt( $request->password);
        $user->rol_id = $request->id;

          $user->save();
          return Redirect::to("user");
    }


    public function destroy(Request $request)
    {
        //
        try{
            $user= User::findOrFail($request->id_usuario)->delete();
            return Redirect::to("user")->with("success","Usuario eliminado con exito");
        } catch  (\Illuminate\Database\QueryException $e){
            return Redirect::to("user")->with("danger","No se puede eliminar este registro porque esta asociado con otra asignación");
        }
    }

    public function form(){
        return view("user/form1");
      }

}

