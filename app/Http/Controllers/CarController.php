<?php

namespace App\Http\Controllers;

use App\Rules\DynamicDropdownValidationRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
//use App\Models\Car;
use App\Models\CarEngine;
use App\Models\CarEquipment;
use App\Models\CarType;
use App\Models\FuelType;
use App\Models\Transmission;
use App\Models\Brand;
use App\Models\User;
use App\Models\CarModel;
use App\Rules\FullNameRule;
use App\Models\AdditionalImages;
use App\Models\Offer;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\DB;

class CarController extends Controller
{

    public function index(Request $request){
        //dd(auth()->user()->user_id);
        $cars=Offer::with('transmission','carEngine','brand','carType','fuelType','carModel','user')->orderBy('id_offer','desc')->get();
        
        //dd($cars);

        $brand=Brand::all();
        $carType=CarType::all();
        $fuelType=FuelType::all();
        $dropdownData=$this->getDropdownData();

        return view('welcome',[
            'car'=>$cars,
            'brand'=>$brand,
            'carType'=>$carType,
            'fuelType'=> $fuelType,
        ]);
    }

    public function showPreciseCar($id){
        
        //dd(auth()->user()->user_id);
        $car=Offer::with('transmission','carEngine','brand','carType','fuelType','additionalImages')->find($id);
        $equipment=CarEquipment::find($id);
        $pivot=DB::table('offer_car_equipment')
        ->join('car_equipment','offer_car_equipment.car_equipment_id','=','car_equipment.car_equipment_id')
        ->where('id_offer',$id)
        ->get();

        $user=User::where('user_id','=',$car->user_id)->first();
        
        //dd($pivot);
        //dd($car->user_id);
        $secondaryImages=AdditionalImages::where('id_offer',$id)->get();
        return view('carsOperations.showCar',[
            'preciseCar'=>$car,
            'secondary'=> $secondaryImages,
            'equipment'=>$pivot,
            'user'=>$user

        ]);
    }

    public function create(){
        $brand=Brand::all();
        $carType=CarType::all();
        $carEngine=CarEngine::all();
        $fuelType=FuelType::all();
        $transmission=Transmission::all();
        

        
        
        $dropdownData=$this->getDropdownData123();
        return view('carsOperations.createOffer',[
            'car'=>$brand,
            'carType'=>$carType,
            'carEngine'=>$carEngine,
            'fuelType'=>$fuelType,
            'transmission'=>$transmission
        ]);
    }

    public function store(Request $request){
        //dd($request->input('numberOfSeats'));
        //dd(count($request->file('additionalImages')));
        //dd(auth()->user()->user_id);
        //dd($request->input('numberOfSeats'));
        $formFields=$request->validate([
            'carModel'=>'required',
            'carColor'=>'required',
            'coverImage'=>'required',
            'description'=>'required',
            'carPrice'=>'required',
            'additionalImages'=>'required',
            /*'numberOfSeats'=>'required',
            'numberOfDoors'=>'required'*/
        ]);


        if($request->hasFile('coverImage')){
            $request->file('coverImage')->store('coverImages','public');
        }
        if($request->hasFile('additionalImages')){
            foreach($request->file('additionalImages') as $imageObj){
                $imageObj->store('additionalImages','public');
            }
        }
        //if($request->hasFile('additionalImages'))
        DB::insert('INSERT INTO offer(car_price,created_at,expired_at,id_brand,id_car_model,id_car_engine,id_car_type,id_transmission,id_fuel_type,description,color,mileage,cover_image,user_id,number_of_doors,number_of_seats) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)',[
            $formFields['carPrice'],
            NULL,
            NULL,
            $request->brand,
            $formFields['carModel'],
            $request->carEngine,
            $request->carType,
            $request->fuelType,
            $request->transmission,
            $formFields['description'],
            $formFields['carColor'],
            $request->mileage,
            $request->file('coverImage')->store('coverImages','public'),
            auth()->user()->user_id,
            $request->numberOfSeats,
            $request->numberOfDoors
            //$request->
        ]);

        $selected=DB::select('SELECT id_offer FROM offer ORDER BY id_offer DESC LIMIT 1');
        
        //dd($selected[0]->id_offer);

        //DB::insert('INSERT INTO')
        foreach($request->file('additionalImages') as $obj){
            DB::insert('INSERT INTO additional_images(id_offer,secondary_image_src) VALUES(?,?)',[
                $selected[0]->id_offer,
                $obj->store('additionalImages','public')
            ]);
        }

        $message=Session::flash('message','test message123');
        $abc=Session::get('message');
        //dd($abc);
        return redirect('/');

        //return redirect('/')->with('message', 'Offer created successfully!');
    }
    public function optionShowing(Request $request){
        $value=$request->key1;

        $result=DB::select('SELECT * FROM car_model WHERE id_brand=?',[$value]);

        return response()->json($result);
    }

    private function getDropdownData(){
        $brand=Brand::all();

        return compact(/*'carEngine', 'carType', 'fuelType', 'transmission', */'brand');
    }
    private function getDropdownData123(){
        $brand=Brand::all();
        return compact('brand');
    }

    //Delete offer
    public function destroy(Request $request){
        $car=Offer::findOrFail($request->route('id'));
        $car->delete();
        if(Auth::check()){
            return redirect('/')->with('message', 'Offer deleted successfully');
        }else{
            return redirect('/login')->with('message','Please login');
        }
    }

    //Show edit form
    public function edit($id){
        //dd($id);
        $offer=Offer::with('transmission','carEngine','brand','carType','fuelType','carModel')->find($id);
        $secondaryImages=AdditionalImages::where('id_offer',$id)->get();
        //dd($secondaryImages);
        //dd($offer);

        //dd($offer->id_car_model);

        $brand=Brand::all();
        $carType=CarType::all();
        $carEngine=CarEngine::all();
        $fuelType=FuelType::all();
        $transmission=Transmission::all();

        return view('carsOperations.edit',[
            'offer'=>$offer,
            'secondary'=>$secondaryImages,
            'brand'=>$brand,
            'carType'=> $carType,
            'carEngine'=>$carEngine,
            'fuelType'=> $fuelType,
            'transmission'=> $transmission,
        ]);
        /*return view('carsOperations.edit',[
            'edit'=>$offer
        ]);*/
    }

    //Update selected form
    public function update(Request $request, $id){
        //dd($id);
        //dd($id);
        $offer=Offer::find($id);
        //dd($request);
        //dd($offer->id_brand);
        if($request->hasFile('coverImage')){
            $request->file('coverImage')->store('coverImages','public');
        }

        DB::table('offer')
        ->where('id_offer',$id)
        ->update([
            'id_brand'=>$request->brand,
            'car_price'=> $request->carPrice,
            'id_car_model'=>$request->carModel,
            'id_car_engine'=>$request->carEngine,
            'id_car_type'=>$request->carType,
            'id_transmission'=>$request->transmission,
            'id_fuel_type'=>$request->fuelType,
            'mileage'=> $request->mileage,
            'description'=> $request->description,
            'cover_image'=> $request->file('coverImage')?$request->file('coverImage')->store('coverImages','public'):null,
            'color'=> $request->carColor
        ]);

        return redirect('/')->with('message','Offer updated successfully');
        /*DB::insert('INSERT INTO offer(car_price,created_at,expired_at,id_brand,id_car_model,id_car_engine,id_car_type,id_transmission,id_fuel_type,description,color,mileage,cover_image) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)',[
            $request->carPrice,
            NULL,
            NULL,
            $request->brand,
            $request->carModel,
            $request->carEngine,
            $request->carType,
            $request->fuelType,
            $request->transmission,
            $request->description,
            $request->carColor,
            $request->mileage,
            $request->file('coverImage')->store('coverImages','public')
        ]);*/


    }
    public function manageOffers(Request $request){
        //dd(auth()->user());
        return view('carsOperations.manageOffer',[
            'offers'=>auth()->user()->cars()->get()
        ]);
    }

    public function showAllOffers(Request $request){
        //dd($request);

        $carType=CarType::all();
        $brand=Brand::all();
        $carModel=CarModel::all();
        $carEngine=CarEngine::all();
        $fuelType=FuelType::all();
        $transmission=Transmission::all();
        $cars=Offer::with('transmission','carEngine','brand','carType','fuelType','carModel','user')->orderBy('id_offer','desc')->filter(request(['brand','carType','carModel','carEngine','fuelType','transmission','priceFrom','priceTo','mileage','doors','seats']))->get();
        return view('carsOperations.showAllOffers',[
            'offers'=>$cars,
            'carType'=>$carType,
            'brand'=>$brand,
            'carModel'=> $carModel,
            'carEngine'=> $carEngine,
            'fuelType'=> $fuelType,
            'transmission'=>$transmission
        ]);

    }

    /*public function filtering(Request $request){
        //dd($request);
        $carType=CarType::all();
        $brand=Brand::all();
        $carModel=CarModel::all();
        $carEngine=CarEngine::all();
        $fuelType=FuelType::all();
        $transmission=Transmission::all();

        $offer=Offer::with('brand','carType','carModel','carEngine','fuelType','transmission')->orderBy('id_offer','desc')->filter(request(['brand','carType','carModel','carEngine','fuelType','transmission']))->get();
        
        return view('carsOperations.showAllOffers',[
            'offers'=>$offer
        ]);
    }*/
        //dd($offer);
        /*$filter=DB::table('offer')
        ->join('car_brand','offer.id_brand','=','car_brand.id_brand')
        ->join('transmission','offer.id_transmission','=','transmission.id_transmission')
        ->join('car_engine','offer.id_car_engine','=','car_engine.id_car_engine')
        ->join('car_type','offer.id_car_type','=','car_type.id_car_type')
        ->join('fuel_type','offer.id_fuel_type','=','fuel_type.id_fuel_type')
        ->join('car_model','offer.id_car_model','=','car_model.id_car_model');
        //->where('');
        if($request->input('brand')!=null){
            $filter->where('offer.id_brand','=',$request->input('brand'));
        }
        if($request->input('transmission')!=null){
            $filter->orWhere('offer.id_transmission','=',$request->input('transmission'));
        }
        if($request->input('carModel')!=null){
            $filter->orWhere('offer.id_car_model','=',$request->input('carModel'));
        }
        if($request->input('carEngine')!=null){
            $filter->orWhere('offer.id_car_engine','=',$request->input('carEngine'));
        }
        if($request->input('fuelType')!=null){
            $filter->orWhere('offer.id_fuel_type','=',$request->input('fuelType'));
        }
        if($request->input('carType')!=null){
            $filter->orWhere('offer.id_car_type','=',$request->input('id_car_type'));
        }
        if($request->input('priceFrom')!=null&&$request->input('priceTo')!=null){
            $filter->orWhere('offer.id_car_type','=',$request->input('id_car_type'));
        }
        $result=$filter->get();
        /*if($request->input('brand')!=null){
            $filter->where('id_brand','=',$request->input('brand'));
        }
        if($request->input('brand')!=null){
            $filter->where('id_brand','=',$request->input('brand'));
        }*/

        /*return view('carsOperations.showAllOffers',[
            'offers'=> $result,
            'carType'=>$carType,
            'brand'=>$brand,
            'carModel'=> $carModel,
            'carEngine'=> $carEngine,
            'fuelType'=> $fuelType,
            'transmission'=>$transmission
        ]);*/
        //dd($request);
        //return 125;
    

}
