<?php

namespace App\Http\Controllers;

use App\Like;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function postLike(Request $request){
        $id=$request["post_id"];
        $is_like=$request["like"]==="true";
        $update=false;
        $post=Post::find($id);
        if (!$post){
            return null;
        }
        $user=Auth::user();
        $like=$user->likes()->where('post_id', $id)->first();
        if($like){
            $already_like=$like->like;
            $update=true;
            if($already_like==$is_like){
                $like->delete();
                return null;
            }
        }else{
            $like=new Like();
        }
        $like->like=$is_like;
        $like->usuario_id=$user->id;
        $like->post_id=$post->id;
            $like->save();
        return null;
    }
}
