<?php
// Route model binding for don't write query for every time laravel will do it for us

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use App\Models\Job;
use Illuminate\Support\Facades\Route;


Route::get('test',function(){
    TranslateJob::dispatch(Job::first())->delay(5);
    return "done";
});

// Route::get('/', function () {

//     return view('index');
// });

Route::view("/","index");
Route::view('/contact', 'contact');

// resource controller
// Route::resource("jobs",JobController::class)->only(['index','show']);
// Route::resource("jobs",JobController::class)->except(['index','show'])->middleware('auth');

Route::get('/jobs',[JobController::class,'index']);
Route::get('/jobs/create',[JobController::class,'create']);
Route::post('/jobs',[JobController::class,'store'])->middleware('auth');
Route::get('/jobs/{job}',[JobController::class,'show']);
Route::get('/jobs/{job}/edit',[JobController::class,'edit'])
->middleware('auth')
->can('edit','job');
// Route::get('/jobs/{job}/edit',[JobController::class,'edit'])->middleware(['auth','can:edit-job,job']);
Route::patch('/jobs/{job}',[JobController::class,'update']);
Route::delete('/jobs/{job}',[JobController::class,'destroy']);

// auth
Route::get("/register",[RegisterController::class,"create"]);
Route::post("/register",[RegisterController::class,"store"]);

Route::get("/login",[SessionController::class,"create"])->name('login');
Route::post("/login",[SessionController::class,"store"]);
Route::post("/logout",[SessionController::class,"destroy"]);


// // grouping routes based on controller
// Route::controller(JobController::class)->group(function(){
//     // index
// Route::get("/jobs","index");
// // create
// Route::get("/jobs/create","create");

// // show
// Route::get("/jobs/{job}","show");

// // store

// Route::post("/jobs","store");

// // edit

// Route::get("/jobs/{job}/edit","edit");

// // update

// Route::patch("/jobs/{job}","update");

// // destroy
// Route::delete("/jobs/{job}","destroy");

// });



