<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Brand;
use App\Models\CarEngine;
use App\Models\CarModel;
use App\Models\FuelType;
use App\Models\Offer;
use Illuminate\Support\Facades\Session;
use App\Models\CarType;
use App\Models\Transmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function registerForm(Request $request){
        return view('users.register');
    }

    public function createNewUser(Request $request){
        //dd($request);
        
        $fullNameRegex="/^[A-Za-z]{3,30}+$/";

        $formFields=$request->validate([
            'firstName'=>[
                'required',
                'regex:/^[a-zA-Z]{3,30}+$/'
            ],
            'lastName'=>[
                'required',
                'regex:/^[a-zA-Z]+$/'
            ],
            'email'=>[
                'email:rfc,dns'
            ],
            'password1'=>[
                'required',
            ],
            'username'=>[
                'required',
                'regex:/^[a-zA-Z0-9_-]{3,16}$/'
            ],
        ]);

        $endryptedPassword=bcrypt($formFields['password1']);


        $user=User::create([
            'first_name'=> $formFields['firstName'],
            'last_name'=> $formFields['lastName'],
            'email'=> $formFields['email'],
            'password1'=> $endryptedPassword,
            'username'=> $formFields['username'],
        ]);
        auth()->login($user);


        return redirect('/')->with('message',[
            'body'=>'Welcome '.auth()->user()->username.', you are successfully logged in!'
        ]);
    }
    public function showLogin(Request $request){
        return view('users.login');
    }
    public function loginUser(Request $request){

        $credentials=$request->validate([
            'email'=>'email:rfc,dns',
            'password'=>'required'
        ]);
        if(auth()->attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/')->with('message','You are now logged in');
        }
        return back()->withErrors(['email'=>'Invalid credentials']);

    }
    public function logoutUser(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message','You have been logged out');
    }
    public function showUserInfo(Request $request,$id){
        //dd($id);
        $user=User::find($id);
        $offers=Offer::where('user_id',$id)->get();
        return view('users.showInfo',[
            'user'=>$user,
            'car'=>$offers,
        ]);
        //dd($user);
    }
    public function submitMessage(Request $request,$id){
        //dd(Auth::user()->user_id);
        //dd($request);
        //dd($id);
        if(Auth::check()){
            $insertion=DB::insert("INSERT INTO user_offer_review(user_id,offer_id,message,star_rating) VALUES(?,?,?,?)",[$id,Auth::user()->user_id,$request->input('reviewOwner'),$request->input('rating')]);
        }    
        else{
            Session::flash('submitMessageInfo');
        }
        //Session::flash('submitMessageInfo');
        return redirect()->back()/*->with('openModal',true)*/;

    }
    /*public function fetchOffersForUser(Request $request){
        $cars=Offer::with('transmission','carEngine','brand','carType','fuelType','carModel')->orderBy('id_offer','desc')->get();

        $brand=Brand::all();
        $carType=CarType::all();
        $fuelType=FuelType::all();

        return view('users.showInfo',[
            'car'=>$cars,
            'brand'=>$brand,
            'carType'=>$carType,
            'fuelType'=> $fuelType,
        ]);
    }*/
}
