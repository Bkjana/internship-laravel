<?php

use App\Http\Controllers\Form;
use App\Http\Controllers\student_controller;
use App\Http\Controllers\User_Controller;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});
// Route::get("/stuHome",function(){
//     return view("student.stuHome");
// });

Route::group(['middleware' => ['studentProtection']],function(){
    Route::get('/stuHome',[student_controller::class,'home']);
});

Route::get('/stusignup', [student_controller::class, 'signup']);
Route::post('/stusignup', [student_controller::class, 'store']);
Route::get('/stusignin',[student_controller::class,'signin']);
Route::post('/stusignin',[student_controller::class,'check']);
Route::get('/stuAll',[student_controller::class,'allstudent']);
Route::get('/stuEdit/{id}',[student_controller::class,'editView']);
Route::post('stuEdit/{id}',[student_controller::class,'editSave']);
Route::get('stuDel/{id}',[student_controller::class,'delete']);
Route::get('/stupersonal/{studentid}',[student_controller::class,'personalView']);
Route::get('/stupersonal',[student_controller::class,'personalSave']);
Route::get('/stuLogout',[student_controller::class,'logout']);

// Route::get('/check',[student_controller::class,'checkRepo']);

Route::get('/db',function(){
    return DB::select('select * from student');
});




Route::get('/teasignup', function () {
    return view('teacher.teacherSignup');
});
Route::get('/teasignin', function () {
    return view('teacher.teacherSignin');
});
Route::get("/teaHome",function(){
    return view("teacher.teaHome");
});

Route::view('/home',"home");

Route::prefix('user')->group(function (){
    Route::view("/","user.home");
    Route::post('/signup',[User_Controller::class,'signup']);
    Route::post('/signin',[User_Controller::class,'signin']);
});


Route::view('/suman',"form");
Route::post('/form',[Form::class,'register']);