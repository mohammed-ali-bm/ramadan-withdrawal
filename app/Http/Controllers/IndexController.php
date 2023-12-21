<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Item;
use App\Models\Offer;
use App\Models\Order;
use App\Models\Product;
use App\Tables\Offers;
use Auth;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    //


    public function test(){


        return view("layouts.frontend.index" , [
            "layout" => "frontend",
            'offers' => Offers::class,
            "businesses" => Business::where("status", "active")->get(),
        
        ]);
    }
    public function dashborad()
    {

        return view('dashboard', [
            'businesses' => Business::orderBy('id', 'DESC')->where("status", "pending")->limit(10)->get(),
            'orders' => Order::orderBy('id', 'DESC')->limit(10)->get(),
            "offers_count" => Offer::count(),
            "businesses_count" => Business::count(),
            "products_count" => Product::count(),
        ]);
    }


    function redeemOrder($token, Request   $request)
    {   


        // this route will first check if business is logged  , check if he has valid offer , then redeem the offer

        $return = [];
        if (!auth()->guard('business')->check()) {

            return response()->json(['status' => false, "message" => __("all.business_login")], 200, );
        }


        $business = auth()->guard('business')->user();

        $order = Order::where("token", $token)->first();


        if (!$order) {
            return response()->json(['status' => false, "message" => __("all.order_not_found")], 200,);
        }

         
        if($order->status != "active"){

            return response()->json(['status' => false, "message" => __("all.order_inactive")], 200,);
        }

        $item = Item::with("offer")->whereHas(
            "offer",
            function ($q) use ($business) {
                $q->where("business_id", $business->id);
            }
        )->where("order_id" , $order->id )->first();


        if (!$item) {
            return response()->json(['status' => false, "message" => __("all.item_not_found")], 200,);
        }

if($item->redeemed_date != null){

    return response()->json(['status' => false, "message" => __("all.order_redeemed" , ['date' => $item->redeemed_date ] )], 200,);
}
        if($item->status != "active"){

            return response()->json(['status' => false, "message" => __("all.item_inactive")], 200,);
        }
     
     


        $item->redeemed_date =  date("Y-m-d H:i:s");
        $item->status = "inactive";
        $item->save();

        return response()->json(['status' => true, "message" => __("all.order_redeemed_successfully" , ["name" => $item->offer->name , "description" => $item->offer->description])], 200,);


        // return redirect()->route("orders.index")->with("success", "Order Redeemed Successfully");

    }





    function businessProfile($token)
    {

        $business = Business::where("token", $token)->firstOrFail();

        $business->logo = asset("images/" . $business->logo);


        if ($business->status == "active") {

            Auth::guard("business")->login($business);
        }

        return view("businesses.profile", compact("business"));
    }
}
