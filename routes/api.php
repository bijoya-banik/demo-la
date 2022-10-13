<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userController;    
use App\Http\Controllers\postController;    
use App\Http\Controllers\categoryController;    
use App\Http\Controllers\tagController;    
use App\Http\Controllers\FileController;    

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();    
});



Route::post('/register',[userController::class, 'register']);
Route::post('/login',[userController::class, 'login']);


//Route::get('user', [userController::class, 'getAuthenticatedUser']);
Route::post('/upload',[FileController::class, 'upload']);    
Route::group(['middleware' => ['jwt.verify']], function() {

     
Route::post('/addPost',[postController::class, 'addPost']);
Route::get('/showAllPosts',[postController::class, 'showAllPosts']);
Route::get('/showPostsbyCategory/{category_id}',[postController::class, 'showPostsbyCategory']);


Route::post('/addCategory',[categoryController::class, 'addCategory']);
Route::get('/showAllCategory',[categoryController::class, 'showAllCategory']);
 
                       
Route::post('/addTag',[tagController::class, 'addTag']);
Route::get('/showAllTag',[tagController::class, 'showAllTag']);

Route::post('/editUser',[userController::class, 'editUser']);
Route::post('/logout',[userController::class, 'logout']);




   
}); 

                 
