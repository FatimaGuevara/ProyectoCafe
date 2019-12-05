<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function showLoginForm(){
        if(Auth::check()){
            return Redirect::to('/home');
        }
        return view('auth.login');
    }

    public function login(Request $request){

        $this->validateLogin($request);      
 
         if (Auth::attempt(['usuario' => $request->usuario,'password' => $request->password])){
            return redirect('/home');
         }

         return back()->withErrors(['usuario' => trans('auth.failed')])
         ->withInput(request(['usuario']));
     }

    protected function validateLogin(Request $request){
        $this->validate($request,[
            'usuario' => 'required|string',
            'password' => 'required|string'
        ]);
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }

}
