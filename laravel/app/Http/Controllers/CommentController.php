<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentController extends Controller
{
    public function save(Request $request){
        $validate = $this->validate($request,[
            'image_id'=>'required',
            'content'=>'required'
        ]);
        $content = $request->input('content');
        $image_id = $request->input('image_id');
        $user_id = \Auth::user()->id;

        $comment = new Comment();
        $comment->user_id = $user_id;
        $comment->image_id = $image_id;
        $comment->content = $content;
        $comment->save();


        return redirect()->route('Image.comments',['id'=>$image_id]);
    }
}
