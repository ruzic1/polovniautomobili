<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferUserReview extends Model
{
    use HasFactory;

    protected $table="user_offer_review";

    protected $primaryKey="review_id";

    public function cars(){
        return $this->belongsTo(Offer::class,'offer_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    
}
