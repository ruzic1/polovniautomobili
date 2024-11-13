<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FuelType extends Model
{
    use HasFactory;

    protected $table="fuel_type";
    protected $primaryKey="id_fuel_type";
    public function cars(){
        return $this->hasMany(Offer::class,'id_fuel_type');
    }
}
