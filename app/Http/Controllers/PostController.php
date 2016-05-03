<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    //
    public function postCrearPost(Request $request){
        $this->validate($request, [
            'body' => 'required|max:1000'
        ]);
        $post=new Post();
        $post->body=$request["body"];
        $message="Ocurrió un error!";
        if ($request->user()->posts()->save($post)){
            $message='Publicado correctamente!';
        }
        return redirect()->route('inicio')->with($message);
    }
}
