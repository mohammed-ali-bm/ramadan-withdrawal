<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use QrCode;

class Order extends Model
{
    use HasFactory;


    protected $table = 'orders';

    public $timestamps = true;

    protected $primaryKey = 'id';

    protected $fillable = ['id', "product_id", 'store_order_id', 'username', "mobile", "email", "sms_sent", "expire_date",  "status"];


    function product()
    {
        return $this->belongsTo(Product::class);
    }


    function newOrder()
    {

        try {


            $product = Product::with("offer")->find($this->product_id);


            $order = new Order();
            $order->product_id = $this->product_id;
            $order->store_order_id = $this->store_order_id;
            $order->username = $this->username;
            $order->mobile = $this->mobile;
            $order->email = $this->email;
            $order->sms_sent = $this->sms_sent ?? false;
            $order->expire_date = $product->expire_date;

            $order->status = $this->status ?? "active";
            $order->token = generateToken();

            // $qrCode =;
            $order->qr_code =   "data:image/png;base64";

            $order->save();

            // store and generate qr for the order 





            $offers = $product->offer;

            foreach ($offers as $offer) {
                $item = new Item();
                $item->order_id = $order->id;
                $item->offer_id = $offer->id;
                $item->business_due = $offer->business_due;
                $item->expire_date = $product->expire_date;
                $item->status = "active";
                $item->save();
            }

            return route("orders.qr.view", $order->token);
        } catch (\Exception $e) {


            dd($e->getMessage());
            return false;
        }
    }
}
