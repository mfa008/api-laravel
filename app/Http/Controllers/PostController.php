<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    public function createPost(){
        $post = new Post();
        $post->titre = "Casa de papel";
        $post->description = "Serie de braquage ";
        $post->save();
    }
}
