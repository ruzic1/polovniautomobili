<?php

use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [CarController::class,'index'])->name('index');


Route::get('/cars/filter',[CarController::class,'filter'])->name('cars.filter');

//Route::get('/cars/create',[CarController::class,'createCarOffer']);

//Show form for creating Offer
Route::get('/cars/create',[CarController::class,'create'])->middleware('auth');


//Create new offer
Route::post('/cars',[CarController::class,'store'])/*->middleware('auth')*/;


//Show edit offer
Route::get('/cars/{id}/edit',[CarController::class,'edit'])->middleware('auth');



Route::post('/getOptions',[CarController::class,'optionShowing']);




//Update offer
Route::put('/cars/{id}',[CarController::class,'update'])->middleware('auth');


//Delete offer
Route::delete('/cars/{id}',[CarController::class,'destroy'])->middleware('auth');


//Manage offers
Route::get('/cars/manage',[CarController::class,'manageOffers'])->middleware('auth');

Route::get('/showAllOffers',[CarController::class,'showAllOffers']);




//USER OPS


//Show Register form
Route::get('/register',[UserController::class,'registerForm'])->middleware('guest');

//Create User
Route::post('/createUser',[UserController::class,'createNewUser']);


//Show Login form
Route::get('/login',[UserController::class,'showLogin'])->name('login')->middleware('guest');

//Login user
Route::post('/loginUser',[UserController::class,'loginUser'])->middleware('guest');

Route::get('/loginUser',function(){
    return redirect()->route('index');
});

//Logout user
Route::post('/logout',[UserController::class,'logoutUser'])->middleware('auth');

//Single User info and offers
Route::get('/users/showUserInfo/{id}',[UserController::class,'showUserInfo']);

//Route::get('/fetchOffersForUser',[UserController::class,'showUserInfo']);



//Submit message and rating
Route::get('/submitMessage/{id}',[UserController::class,'submitMessage'])->name('submitMessage');


//Single listing
Route::get('/cars/{id}',[CarController::class,'showPreciseCar']);
//Route::get('/',[CarController::class,'filterCars']);
