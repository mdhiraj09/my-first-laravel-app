<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\ResourceController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\CustomerController;
use App\Models\Customers;
//controller add kia hai

//Route ek class hai or get uska method
//or ek callback dete hai vaha se controller mange kr sakte hai
// Route::get("/demo",function(){
//     return view('demo');
// });

//---------------------------------------------------

//query string se data lene ka way or modelko pass karne ka
//compact function array banta hai variable ka adata array me
//#blade ka syntax hai koi value ko echo karne ka {{}} variable ka naam jo pass kia hai web.php se demo me
// Route::get("/username/{name}",function($name){
//   $data = compact('name');
// //   print_r($data);
//   return view('demo')->with($data);
// });
// //-----------------------------------------
//optional paramter bhi de sakte hai optional ke pichee ? hai
// Route::get("/username/{name}/{id?}",function($name,$id = null){
//     echo $name;
//  });


//---------------------------------------
//return function page reurn karega
//any har tarah ki request lega
// Route::any("/post",function(){
//     echo"testing the post";
// });
// Route::get('/{name?}', function ($name = null) {
//     $demo = '<h2>Hello</h2>';
//     $data = compact('name','demo');
//     return view('home')->with($data);
// });
//--------------------------------------------------------------------
//1st way
// Route::get('/',[DemoController::class,'index']);
//controller se function call kia hai
//2nd way-------------
// Route::get('/about','app\Http\Controllers\DemoController::about');

// Route::get('/about', SingleActionController::class);
//single action controller ko invoke karte time array baanene ki jarurat nhi


// Route::resource('/photo',ResourceController::class);
//isme CRUD k liye saare function bane hote hai pahlese bas path set krke function call krta hai
//resource controller me function change nhi kar sakte hai


Route::get('/register',[RegistrationController::class,'index']);
Route::post('/register',[RegistrationController::class,'register']);
Route::get('/customer',[CustomerController::class,'index'])->name('customer.create');
Route::post('/customer',[CustomerController::class,'store']);
Route::get("/customer/view",[CustomerController::class,'view']);

Route::get('/customer/delete/{id}',[CustomerController::class,'delete'])->name('customer.delte');
Route::get('/customer/edit/{id}',[CustomerController::class,'edit'])->name('customer.edit');
Route::post('/customer/update/{id}',[CustomerController::class,'update'])->name('customer.update');
Route::get('/',function(){
    return view("nav");
});
