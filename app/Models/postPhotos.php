<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class postPhotos extends Model 
{         
    use HasFactory;                     
    protected $fillable =['link']; 

    // public function postPhotos(){ 

    //     return $this->belongsToMany('App\Models\Post','post_photos');//->withTimestamps();
    // }
    // public function postPhotos(){

    //     return $this->belongsToMany('App\Models\Post','post_photos');
    // }
}
  