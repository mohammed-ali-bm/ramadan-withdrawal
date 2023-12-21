<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Order\StatusOrderRequest;
use App\Http\Requests\Admin\Order\StoreOrderRequest;
use App\Http\Requests\Admin\Order\UpdateOrderRequest;
use App\Models\Order;
use App\Models\Item;
use Illuminate\Http\Request;

use App\Tables\Orders;
use App\Tables\Items;
use Illuminate\Contracts\Cache\Store;
use ProtoneMedia\Splade\Facades\Toast;

class OrderController extends Controller
{
    //



    public function createTemp()
    {

        $Order = new Order();

        $Order->product_id  = 3;
        $Order->store_order_id  =  generateToken();
        $Order->username  = "test";
        $Order->mobile  = "test";
        $Order->email  = "test";
        $Order->sms_sent  = false;
        $Order->status  = "active";
        $create =  $Order->newOrder();

        dd($create);
    }

    public function index()
    {


       
        return view('orders.index', [
            'orders' => Orders::class
        ]);
    }

    public function create()
    {


        $products = \App\Models\Product::where('status', 'active')->where("expire_date" ,">" , date("Y-m-d"))->orderBy("id" ,"DESC")->pluck('name', 'id');
        return view('orders.create', ['products' => $products]);
    }

    public function show(Order $order)
    {


        return view('orders.show', ["order" => $order, "items" =>  new Items(Item::with("offer.business")->with("order")->where("order_id", $order->id))]);
    }

    public function viewQR($token)
    {

        $order = Order::where("token", $token)->first();

        $items =  Item::with("offer.business")->with("order")->where("order_id", $order->id)->orderBy("redeemed_date","ASC")->get();
        return view('orders.token', [
            "order" => $order,
            'items' =>$items,
        ]);
    }



    public function edit(Order $order)
    {

        $businesses = \App\Models\Business::where('status', 'active')->pluck('name', 'id');

        return view('orders.edit', compact("order", "businesses"));
    }


    function update(UpdateOrderRequest $request, Order $order)
    {


        // check if new logo is uploaded 




        $order->update($request->validated());
        Toast::title(__("all.updated"))
            ->message(__("all.order.updated"))
            ->success()
            ->rightTop()

            ->autoDismiss(3);
        return redirect()->route('orders.index')
            ->with('success', __("all.order.updated"));
    }


    function store(StoreOrderRequest $request, Order $order)
    {


        // check if new logo is uploaded 


      
        $Order = new Order();

        $Order->product_id  = $request->product_id;
        $Order->store_order_id  =   $request->store_order_id ?? "";
        $Order->username  = $request->username;
        $Order->mobile  = $request->mobile;
        $Order->email  = $request->email;
        $Order->sms_sent  = false;
        $Order->status  = "active";
        $Order->qr_code = "";
        $create =  $Order->newOrder();

        if($create){
            $sms  = sendSMS($request->mobile,  __("all.order_placed" , ['link' => $create ] ) );
       
            if($sms['status']){
                // update sms sent to true in  the latest order by id 
                Order::latest()->first()->update(["sms_sent" => true]);
               
            }else{
                
                return redirect()->route('orders.index')
                ->with('error', __("all.sms_not_sent"));
            }
        }

 
        return redirect()->route('orders.index')
            ->with('success', __("all.order.added"));
    }

    function updateStatus(StatusOrderRequest $request, Order $order)
    {





        $order->update($request->validated());
        Toast::title(__("all.updated"))
            ->message(__("all.order.updated"))
            ->success()
            ->rightTop()

            ->autoDismiss(3);
        return redirect()->route('orders.index')
            ->with('success', __("all.order.updated"));
    }

    function destroy(Order $order)
    {
        $order->delete();
        // Toast::title(__("all.deleted"))
        // ->message(__("all.order.deleted"))
        // ->success()
        // ->rightTop()
        // 
        // ->autoDismiss(15);
        return redirect()->route('orders.index')
            ->with('success', __("all.order.deleted"));
    }
}
