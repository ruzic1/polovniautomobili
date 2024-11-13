<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarEquipment extends Model
{
    use HasFactory;

    protected $primaryKey="car_equipment_id";
    public function cars(){
        return $this->belongsToMany(Offer::class,'offer_car_equipment');
    }
}
