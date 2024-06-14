<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegistrationController;
use App\Models\Customer;
use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use App\Models\Post; // Add this line to import the 'Post' model
use App\Models\User;
use App\Models\Role;
use App\Models\country;
use App\Models\Tag;
  
use App\Models\Audio;  

/*
|-------------------------------------------------------------------------
|--------------------------------------------
| Web Routes
|-------------------------------
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/customer',function(){
//     $customers = Customer::all();
//     echo "<pre>";
//     print_r($customers->toArray());
//     // return view('customer',['customer'=>$customer]);
// });
    
Route::get('/',function(){
    return view('index');
});

Route::get('/register',[RegistrationController::class,'index']);
Route::post('/register',[RegistrationController::class,'register']);

Route::get('/customer/create',[CustomerController::class,'create'])->name("customer.create");
Route::post('/customer',[CustomerController::class,'store']);
Route::get('/customer',[CustomerController::class,'view']);
Route::get('/customer/delete/{id}',[CustomerController::class,'delete'])->name('customer.delete');
Route::get('/customer/edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');
Route::post('/customer/update/{id}',[CustomerController::class,'update'])->name('customer.update');
Route::get('/customer/trash',[CustomerController::class,'trash'])->name('customer.trash');
Route::get('/customer/restore/{id}',[CustomerController::class,'restore'])->name('customer.restore');
Route::get('/customer/force-delete/{id}',[CustomerController::class,'forceDelete'])->name('customer.force-delete');


Route::get('/get-all-session',function(){
    $session = session()->all();
   p($session);
});
Route::get('set-session',function(Request $request){
    $request->session()->put('customer_name','Vraj Clerk');
    $request->session()->put('customer_id','12');
    $request->session()->flash('status','success');
    return redirect('get-all-session');

});
Route::get('destroy-session',function(Request $request){
    $request->session()->forget('customer_name');
    $request->session()->forget('customer_id');
    return redirect('get-all-session');
});

Route::get('/read',function(){  
$posts=Post::all();  
foreach($posts as $post)  
{  
  echo $post->body;  
//   echo ?<br>?;  
}  
});
Route::get('/find',function(){  
    $posts=Post::where('id',1)->first();  
    return $posts;  
    });   
    
    Route::get('/insert',function(){  
        $post=new Post;  
        $post->title='Nishka';  
        $post->body='QA Analyst';  
        $post->user_id='1';
        $post->save();  
        });  

        Route::get('/user',function()  
        {  
             return User::find(1)->post;  
        }  
        );  
        Route::get('/post/user',function()  
{  
 return Post::find(3)->user->name;  
});

//One-to-many
Route::get('/posts',function(){  
    $user=User::find(1);  
    foreach($user->posts as $post){  
    echo $post->title."<br>";  
    }  
    }); 
    
    //Many-to-Many
    Route::get('/roles/{id}',function($id){  
        $user=User::find($id);  
        foreach($user->role as $role)  
        {  
           return $role->name;  
        }  
        });  

        Route::get('/user/country',function()  
        {  
         $country=country::find(1);  
            foreach($country->posts as $post)  
            {  
                return $post->title;  
                }  
            }); 
            //polumorphic
            Route::get('/user/photo',function(){  
                $user=User::find(1);  
                foreach($user->photos as $photo)  
                {  
                   return $photo;  
                }  
                }); 

                // Route defined for the posts.  
Route::get('/post/photo',function(){  
    $post=Post::find(1);  
    foreach($post->photos as $photo)  
    {  
       return $photo;  
    }  
      
    });  



// Route for getting the tags from the Post model.  
Route::get('/post/tags',function()  
{  
  $post=Post::find(3);   
  foreach($post->tags as $tag)  
  {  
    return $tag->name;  
  }});  
//Route for getting the tags from the Audio model.  
Route::get('/audio/tags',function()  
{  
  $audio=Audio::find(1);   
  foreach($audio->tags as $tag)  
  {  
    return $tag->name;  
  }});  


  // Route for getting all the posts of a tag.  
Route::get('/tag/post/{id}',function($id){  
  $tag=Tag::find($id);  
  foreach($tag->posts as $post)  
  {  
     return $post->title;  
  }  
  });  
  // Route for getting all the audios of a tag.  
  Route::get('/tag/audio/{id}',function($id){  
  $tag=Tag::find($id);  
  foreach($tag->audios as $audio)  
  {  
     return $audio->name;  
  }  
  });  