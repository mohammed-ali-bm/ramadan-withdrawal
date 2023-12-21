<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Business extends Authenticatable
{
    use HasFactory;


    protected $table = 'businesses';

    public $timestamps = true;

    protected $primaryKey = 'id';

    protected $fillable = ['id', 'name', 'phone', "logo", "address","token" ,  "status"];

    function offer()
    {
        return $this->hasMany(Offer::class);
    }


}
