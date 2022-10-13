<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class tagController extends Controller
{
    public function addTag(Request $request){

        
        $tag = Tag::create(
            [
                'tagName'=>$request->tagName
            ]
            
        );

        return response()->json([       
            'success'=>true,
            'data'=>$tag,
                   
        ]);
    }

    public function showAllTag(){   
        
        $tag =  Tag::all();

        return response()->json([
            'success'=>true,
            'tags'=>$tag,
        
            ]);
    }
}
