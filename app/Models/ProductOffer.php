<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOffer extends Model
{
    use HasFactory;

    protected $table = 'product_offer';
    public $timestamps = true;


    protected $fillable = ['product_id', "offer_id"];

    function product()
    {
        return $this->belongsTo(Product::class, "product_id");
    }
    function offer()
    {
        return $this->belongsTo(Offer::class, "offer_id");
    }


}
