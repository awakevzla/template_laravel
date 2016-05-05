<?php

namespace App\Http\Controllers;

use App\Usuario;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

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
    public function getPerfil(){
        return view('perfil', ['user'=>Auth::user()]);
    }
    public function postGuardarPerfil(Request $request){
        $this->validate($request, [
            'usuario' => 'required|max:120',
        ]);
        $user=Auth::user();
        $user->usuario=$request["usuario"];
        $user->update();
        $file=$request["image"];
        $filename=$request["usuario"]."-".$user->id.".jpg";
        if($file){
            Storage::disk('local')->put($filename,File::get($file));
        }
        return redirect()->back();
    }
    public function getImagenUsuario($filename){
        $imagen=Storage::disk('local')->get($filename);
        return new Response($imagen, 200);
    }
}
