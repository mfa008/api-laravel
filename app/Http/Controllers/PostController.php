<?php

namespace App\Http\Controllers;

use App\Http\Requests\createPostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Exception;

class PostController extends Controller
{
    //
    public function createPost(createPostRequest $request){
        // dd($request);
        $post = new Post();
        
        $post->titre = $request->titre;
        $post->description = $request->description;

        $post->save();
        return response()->json([
            'message'=> $post,
        ]);
    }

    public function editPost(Request $request,$id){

       try{
        $post = Post::find($id);
        // $post->titre = "Shinzou woo sasageyo ";
        // $post->save();

        $post->titre = $request->titre;
        $post->description = $request->description;
        $post->save();
        return response()->json([
            "status" => 200 ,
            "post"  => $post
        ]);
        
         } catch(Exception $e ){
            return response()->json([
                'error' => $e
            ]);
        } 
    }

    public function deletePost(Post $post){

        $post->delete();

        return response()->json([
            'message' => 'Post supprime ',
            'status' => 200
        ]);

    }

    public function Posts(){
        $post = Post::all();
        return response()->json([
            "post" => $post
        ]);
    }


}
