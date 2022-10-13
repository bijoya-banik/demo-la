<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable =['tagName'];

    public function postTag(){

        return $this->belongsToMany('App\Models\Post','post_tag', 'post_id','tag_id');//->withTimestamps();
    }

}
