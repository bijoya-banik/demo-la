<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
        

class postController extends Controller
{
    public function addPost(Request $request)
    {

              
        $post = Post::create(                    
            [
                'content' => $request->content,
                'category_id' => $request->category_id,
                'headerImage' => $request->headerImage,
            ]     
          
        );           
        $post->tags()->attach(  
            $request->input('tags') == null ? [] : $request->input('tags')
 );                  
           
        $post->allPhotos()->$request->input('post_photos');

        return response()->json([

            'success' => true,        
            'data' => $post
                
        ]);
    }        
 
    
    public function showAllPosts()
    {
        
           
        $posts = Post::with('category', 'tags')->get();
        $suceess = true;
        return response()->json(
            // [

            // 'success'=>true,
            // 'posts'=>$post,
          
            // ]                         

            compact('suceess', 'posts')
        );
    }                                          
                
    public function showPostsbyCategory(Request $request)
    {        
                     
        $category_id  = $request->category_id;
        $post = Post::where('category_id', $category_id)->with('tags')->get();
        return response()->json(
            [                         
                                              
                'success' => true,
                'posts' => $post                 
                                                            
            ]                                  
        );     
    }
}
