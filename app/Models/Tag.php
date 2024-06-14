<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function posts()  
    {  
      return $this->morphedByMany('App\Models\Post','taggable');   
    }  
// get all the audios from the tag.  
public function audios()  
    {  
      return $this->morphedByMany('App\Models\Audio','taggable');   
    }  
}
