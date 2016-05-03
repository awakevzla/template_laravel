<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class UsuarioController extends Controller
{
    public function postRegistrar(Request $request){
        $this->validate($request, [
            'email'=>'required|unique:usuarios',
            'password'=>'required|confirmed',
            'usuario'=>'required|unique:usuarios',
        ]);
        $email=$request["email"];
        $password=$request["password"];
        $usuario=$request["usuario"];
        $user = new Usuario();
        $user->email = $email;
        $user->password = bcrypt($password);
        $user->usuario = $usuario;
        $user->save();
        return redirect()->back();
    }
    public function postIngresar(Request $request){
        if(Auth::attempt(['email'=>$request["email"], 'password'=>$request["password"]])){
            return redirect()->route('inicio');
        }
        return redirect()->back();
    }
    public function salir(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function getLogin(){
        if (Auth::check())
            return redirect()->route('inicio');
        else
            return view('welcome');
    }
}
