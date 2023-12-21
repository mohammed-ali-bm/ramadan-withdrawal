<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Offer\StatusOfferRequest;
use App\Http\Requests\Admin\Offer\StoreOfferRequest;
use App\Http\Requests\Admin\Offer\UpdateOfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;

use App\Tables\Offers;
use Illuminate\Contracts\Cache\Store;
use ProtoneMedia\Splade\Facades\Toast;

class OfferController extends Controller
{
    //

    public function index()
    {
        return view('offers.index', [
            'offers' => Offers::class
        ]);
    }

    public function create()
    {


        $businesses = \App\Models\Business::where('status', 'active')->pluck('name', 'id');
        return view('offers.create', ['businesses' => $businesses]);
    }

    public function show(Offer $offer)
    {

        return view('offers.show', compact("offer"));
    }



    public function edit(Offer $offer)
    {

        $businesses = \App\Models\Business::where('status', 'active')->pluck('name', 'id');

        return view('offers.edit', compact("offer", "businesses"));
    }

    function store(StoreOfferRequest $request)
    {




        Offer::create(["status" => "active"] + $request->validated());
        Toast::title(__("all.added"))
            ->message(__("all.offer.added"))
            ->success()
            ->rightTop()

            ->autoDismiss(15);
        return redirect()->route('offers.index')
            ->with('success', __("all.offer.added"));
    }

    function update(UpdateOfferRequest $request, Offer $offer)
    {


        // check if new logo is uploaded 




        $offer->update($request->validated());
        Toast::title(__("all.updated"))
            ->message(__("all.offer.updated"))
            ->success()
            ->rightTop()

            ->autoDismiss(3);
        return redirect()->route('offers.index')
            ->with('success', __("all.offer.updated"));
    }

    function updateStatus(StatusOfferRequest $request, Offer $offer)
    {





        $offer->update($request->validated());
        Toast::title(__("all.updated"))
            ->message(__("all.offer.updated"))
            ->success()
            ->rightTop()

            ->autoDismiss(3);
        return redirect()->route('offers.index')
            ->with('success', __("all.offer.updated"));
    }

    function destroy(Offer $offer)
    {
        $offer->delete();
        // Toast::title(__("all.deleted"))
        // ->message(__("all.offer.deleted"))
        // ->success()
        // ->rightTop()
        // 
        // ->autoDismiss(15);
        return redirect()->route('offers.index')
            ->with('success', __("all.offer.deleted"));
    }
}
