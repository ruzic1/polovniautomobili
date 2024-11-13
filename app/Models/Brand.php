<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    //Relationship with Car table
    protected $table="car_brand";
    protected $primaryKey="id_brand";
    public function carModel(){
        return $this->hasMany(CarModel::class,'id_car_model');
    }
    public function cars(){
        return $this->hasMany(Offer::class,'id_brand');
    }
}
