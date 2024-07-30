<?php
// Route model binding for don't write query for every time laravel will do it for us

use App\Http\Controllers\JobController;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    return view('index');
});

// index
Route::get("/jobs",[JobController::class,"index"]);
// create
Route::get("/jobs/create",[JobController::class,"create"]);

// show
Route::get("/jobs/{job}",[JobController::class,"show"]);

// store

Route::post("/jobs",[JobController::class,"store"]);

// edit

Route::get("/jobs/edit/{job}",[JobController::class,"edit"]);

// update

Route::patch("/jobs/{job}",[JobController::class,"update"]);

// destroy
Route::delete("/jobs/{job}",[JobController::class,"destroy"]);


Route::get("/contact",function(){
    return view("contact");
});
