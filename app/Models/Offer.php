<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;


    protected $table = 'offers';

    public $timestamps = true;

    protected $primaryKey = 'id';

    protected $fillable = ['id', "business_id", 'name', 'description', "business_due", "expire_date",   "status"];

    function business()
    {
        return $this->belongsTo(Business::class, "business_id");
    }
    function product()
    {
        return $this->belongsToMany(Product::class, "product_offer", "offer_id", "product_id");
    }
}
