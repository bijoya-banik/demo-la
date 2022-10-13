<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;  
    protected $fillable =['categoryName'];

    public function posts(){

        return $this->hasMany('App\Models\Post');
    }

    public function tags(){  

        return $this->belongsToMany('App\Models\Tag','post_tag','post_id','tag_id');//->withTimestamps();
    }

   
}
