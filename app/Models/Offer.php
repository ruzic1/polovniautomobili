<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $table='offer';
    protected $primaryKey='id_offer';

    protected $fillable = ['id_brand','id_car_type','id_transmission','id_car_engine'/*,'production_date','mileage','description','color'*/,'id_fuel_type','user_id'];
    public $timestamps=false;

/*public function scopeFilter($query, array $filters){
    dd($filters);
}*/
    public function brand()
    {
        return $this->belongsTo(Brand::class,'id_brand');
    }
    public function carType(){
        return $this->belongsTo(CarType::class,'id_car_type');
    }
    public function transmission(){
        return $this->belongsTo(Transmission::class,'id_transmission');
    }
    public function carEngine(){
        return $this->belongsTo(CarEngine::class,'id_car_engine');
    }
    public function fuelType(){
        return $this->belongsTo(FuelType::class,'id_fuel_type');
    }
    public function additionalImages(){
        return $this->hasMany(AdditionalImages::class,'id_secondary_image');
    }
    public function carModel(){
        return $this->belongsTo(CarModel::class,'id_car_model');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function carEquipment(){
        return $this->belongsToMany(CarEquipment::class,'offer_car_equipment');
    }
    /*public function carModel(){
        return $this->belongsTo(CarModel::class,'');
    }*/

    public function scopeFilter($query, array $filters){
        //dd($filters);
        if($filters['brand']??false){
            $query->Where('id_brand',$filters['brand']);
        }


        if($filters['carType']??false){
            $query->Where('id_car_type',$filters['carType']);
        }
        if($filters['carModel']??false){
            $query->Where('id_car_model',$filters['carModel']);
        }
        
        if($filters['fuelType']??false){
            $query->Where('id_fuel_type',$filters['fuelType']);
        }
        if($filters['doors']??false){
            $query->Where('number_of_doors',$filters['doors']);
        }
        if($filters['seats']??false){
            $query->Where('number_of_seats',$filters['seats']);
        }
        if($filters['transmission']??false){
            $query->Where('id_transmission',$filters['transmission']);
        }
        if($filters['carEngine']??false){
            $query->Where('id_car_engine',$filters['carEngine']);
        }
        if($filters['mileage']??false){
            $query->Where('mileage','>',$filters['mileage']);
        }

        if(isset($filters['priceFrom'])||isset($filters['priceTo'])){
            
            $query->whereBetween('car_price',[request('priceFrom'),request('priceTo')]);
        }

        /*if($filters['yearFrom']??false&&$filters['yearTo']??false){
            
            $query->whereRaw('YEAR(production_date) BETWEEN ? AND ?',[$filters['yearFrom'],$filters['yearTo']]);
        }
        if($filters['carType']??false){
            $query->where('id_car_type','like','%'.request('carType').'%');
        }
        if($filters['fuelType']??false){
            $query->where('id_fuel_type','like','%'.request('fuelType').'%');
        }
        if($filters['mileage']??false){
            $query->whereRaw('mileage <'.request('mileage'));
        }*/
        
    }
    /*public function cars(){
        return $this->belongsTo(Offer::class,'id');
    }*/
}
