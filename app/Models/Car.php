<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdditionalImages;

class Car extends Model
{
    use HasFactory;

    protected $table='car';
    protected $fillable = ['brand_id','id_car_type','id_transmission','id_car_engine','car_model','production_date','mileage','description','color','fuel_type'];


    public function brand()
    {
        return $this->belongsTo(Brand::class,'brand_id');
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
    public function offer(){
        return $this->hasMany(AdditionalImages::class,'id_offer');
    }

    public function scopeFilter($query, array $filters){
        if($filters['brand']??false){
            $query->where('brand_id','like','%'.request('brand').'%');
        }
        if($filters['yearFrom']??false&&$filters['yearTo']??false){
            //$query->where('production_date','','%'.request('yearFrom').'%');
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
        }
        
        /*$sql = $query->toSql();
        $bindings = $query->getBindings();*/

        //dd($sql, $bindings);
        //dd($query->toSql());
        //dd($query->toSql());
    }
    /*public function select(){

    }*/

}
