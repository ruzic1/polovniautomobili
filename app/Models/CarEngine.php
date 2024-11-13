<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarEngine extends Model
{
    use HasFactory;

    protected $table="car_engine";
    protected $primaryKey="id_car_engine";


    public function cars(){
        return $this->hasMany(Offer::class,'id_car_engine');
    }
}
