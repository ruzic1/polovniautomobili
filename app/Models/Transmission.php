<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transmission extends Model
{
    use HasFactory;

    protected $table='transmission';
    protected $primaryKey='id_transmission';
    public function cars(){
        return $this->hasMany(Offer::class,'id_transmission');
    }
}
