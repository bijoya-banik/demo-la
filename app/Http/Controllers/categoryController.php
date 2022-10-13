<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class categoryController extends Controller
{


    public function addCategory(Request $request){
     
        
        $category = Category::create(
            [
                'categoryName'=>$request->categoryName
            ]
            
        );

        return response()->json([       
            'success'=>true,
            'data'=>$category,
                   
        ]);
    }

    public function showAllCategory(){   
        
        $category =  Category::all();
        return response()->json([
            'success'=>true,
            'category'=>$category,
        
            ]);
    }
     
}
  