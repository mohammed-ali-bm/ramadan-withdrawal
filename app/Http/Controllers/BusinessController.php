<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Business\StatusBusinessRequest;
use App\Http\Requests\Admin\Business\StoreBusinessRequest;
use App\Http\Requests\Admin\Business\UpdateBusinessRequest;
use App\Models\Business;
use App\Models\Item;
use App\Models\Offer;
use Illuminate\Http\Request;

use App\Tables\Businesses;
use App\Tables\Items;
use App\Tables\Offers;
use Illuminate\Contracts\Cache\Store;
use ProtoneMedia\Splade\Facades\Toast;

class BusinessController extends Controller
{
    //

    public function index()
    {
        return view('businesses.index', [
            'businesses' => Businesses::class
        ]);
    }

    public function create()
    {
        return view('businesses.create');
    }

    public function show(Business $business)
    {
        $business->logo = asset("images/" . $business->logo);

        $business->offers_count = $business->offer()->count();
        $business->due_sum =  Item::whereHas("offer", function ($q) use ($business) {
            $q->where("business_id", $business->id);
        })->where([ ['redeemed_date' , "!=" , NULL] ])->sum("business_due");
        return view('businesses.show', 
    [
        "business" => $business,
        "items" =>  new Items(Item::with("offer.business")->with("order")->whereHas("offer",function($q) use($business){
            $q->where("business_id",$business->id);
        })),
        
        "offers" =>  new Offers(Offer::with("business")->where("business_id",$business->id)),
    
    
    
    ]);
    }



    public function edit(Business $business)
    {

        $business->logo = asset("images/" . $business->logo);
        return view('businesses.edit', compact("business"));
    }

    function store(StoreBusinessRequest $request)
    {


        // store logo 
        $logo = $request->file('logo');
        $logo_name = time() . '.' . $logo->extension();
        $logo->move(public_path('images'), $logo_name);


        Business::create(["logo" => $logo_name, "status" => "active" , "token" => generateToken()  ] + $request->validated());
        Toast::title(__("all.added"))
            ->message(__("all.business.added"))
            ->success()
            ->rightTop()

            ->autoDismiss(15);
        return redirect()->route('businesses.index')
            ->with('success', __("all.business.added"));
    }


   function  checkOfferPage(){


    }

    function update(UpdateBusinessRequest $request, Business $business)
    {


        // check if new logo is uploaded 

        $extra = [];
        if ($request->hasFile("logo")) {
            $logo = $request->file('logo');
            $logo_name = time() . '.' . $logo->extension();
            $logo->move(public_path('images'), $logo_name);
            $extra = ["logo" => $logo_name];
        }



        $business->update($extra + $request->validated());
        Toast::title(__("all.updated"))
            ->message(__("all.business.updated"))
            ->success()
            ->rightTop()

            ->autoDismiss(3);
        return redirect()->route('businesses.index')
            ->with('success', __("all.business.updated"));
    }

    function updateStatus(StatusBusinessRequest $request, Business $business)
    {





        $business->update($request->validated());
        Toast::title(__("all.updated"))
            ->message(__("all.business.updated"))
            ->success()
            ->rightTop()

            ->autoDismiss(3);
        return redirect()->route('businesses.index')
            ->with('success', __("all.business.updated"));
    }

    function destroy(Business $business)
    {
        $business->delete();
        // Toast::title(__("all.deleted"))
        // ->message(__("all.business.deleted"))
        // ->success()
        // ->rightTop()
        // 
        // ->autoDismiss(15);
        return redirect()->route('businesses.index')
            ->with('success', __("all.business.deleted"));
    }


}
