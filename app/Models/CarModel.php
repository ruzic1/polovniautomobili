<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarModel extends Model
{
    use HasFactory;

    protected $table="car_model";
    protected $primaryKey="id_car_model";

    public function brand(){
        return $this->belongsTo(Brand::class,'id_brand');
    }
    public function cars(){
        return $this->hasMany(Offer::class,'id_car_model');
    }
}
