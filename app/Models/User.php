<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    public function post()  
    {  
    return $this->hasOne('App\Models\Post');  
    }  
    //one-to-many
    public function posts()  
    {  
    return $this->hasMany('App\Models\Post','user_id');  
    }  
    //many-to-many
    public function role()  
    {  
   //return $this->belongsToMany('App\Models\Role','roles_user'); 
   return $this->belongsToMany('App\Models\Role','roles_user','user_id','role_id'); 
    }
    //one-to-many(polimorphic)
    public function photos()  
    {  
  return $this->morphMany('App\Models\Photo','imageable');  
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
