<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdditionalImages extends Model
{
    use HasFactory;

    protected $table='additional_images';

    protected $primaryKey='id_secondary_image';

    public function cars(){
        return $this->belongsTo(Offer::class,'id');
    }
    //public function 

}
