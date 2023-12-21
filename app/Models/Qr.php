<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qr extends Model
{
    use HasFactory;


    protected $table = 'qrs';

    public $timestamps = true;

    protected $primaryKey = 'id';

    protected $fillable = ['id', "order_id", 'qr_code',  "token", "status"];


    function order(){
        return $this->belongsTo(Order::class);
    }
}
