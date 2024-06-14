<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    // use HasFactory;
    protected $table='posts';  
    protected $primaryKey='id';
    protected $fillable=  
[  
'title',  
'body'  
];  
protected $dates=['deleted_at'];  


    public function user()  
{  
  return $this->belongsTo('App\Models\User');  
}  
public function photos()  
{  
  return $this->morphMany('App\Models\Photo','imageable');}  

public function tags()  
{  
  return $this->morphToMany('App\Models\Tag','taggable');  
}  
}