<?php

namespace App\Models; 
      
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{                                                                          
    use HasFactory;                                                                     
    protected $fillable =['content','category_id','headerImage'];  
                   
    public function category(){ 
                                        
        return $this->belongsTo('App\Models\Category');
    }                         
                 
    public function tags(){                                           
                                                                        
        return $this->belongsToMany('App\Models\Tag','post_tag');//,'post_id','tag_id');//->withTimestamps();
    } 
    // public function allPhotos(){                            
                                                 
    //     return $this->belongsToMany('App\Models\postPhotos','post_photos');//,'post_id','tag_id');//->withTimestamps();
    // } 
    public function allPhotos(){     
  
        return $this->hasMany('App\Models\postPhotos','post_photos');
    }            
}   
