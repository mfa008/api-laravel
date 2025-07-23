<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/createPost',[ PostController::class , 'createPost' ]);
Route::put('/editPost/{id}', [PostController::class, 'editPost']);
Route::delete('/deletePost/{post}', [PostController::class, 'deletePost']);
Route::get('/Posts', [PostController::class, 'Posts']);
Route::get('/test', [PostController::class, 'test']);

Route::post('/register', [PostController::class, 'register']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// $post = new POST();  
// $post->titre = "Les Imbeciles ";
// $post->description = "L3 GLSI-A ";
// $post->save(); 
// return response()->json([
//     post = $post,
//     titre = pk
// ])