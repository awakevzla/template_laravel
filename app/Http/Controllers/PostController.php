<?php

namespace App\Http\Controllers;

use App\Post;
use App\Usuario;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function getInicio(){
        $posts=Post::orderBy('created_at', 'desc')->get();
        return view('inicio', ['posts'=>$posts]);
    }
    public function postCrearPost(Request $request){
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);
        $post=new Post();
        $post->body=$request["body"];
        $message="Ocurrió un error!";
        $type='danger';
        if ($request->user()->posts()->save($post)){
            $message='Publicado correctamente!';
            $type='success';
        }
        return redirect()->route('inicio')->with(['message'=>$message,'type'=>$type]);
    }
    public function getEliminarPost($id){
        $post=Post::find($id);
        if (Auth::user()!=$post->usuario){
            return redirect()->back()->with(['message'=>'No se puede eliminar un post que no es propio!', 'type'=>'danger']);
        }
        $post->delete();
        return redirect()->route('inicio')->with(['message'=>'Post Eliminado!', 'type'=>'success']);
    }
    public function postEditarPost(Request $request){
        $this->validate($request,[
            'body'=>'required'
        ]);
        $post=Post::find($request["id"]);
        if (Auth::user()!=$post->usuario){
            return redirect()->back()->with(['message'=>'No se puede modificar un post que no es propio!', 'type'=>'danger']);
        }
        $post->body=$request["body"];
        $post->update();
        return response()->json(['msj'=>$post->body]);
    }
}
