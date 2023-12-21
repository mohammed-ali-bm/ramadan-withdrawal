<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Offer\UpdateProductRequest as OfferUpdateProductRequest;
use App\Http\Requests\Admin\Product\StatusProductRequest;
use App\Http\Requests\Admin\Product\StoreProductRequest;
use App\Http\Requests\Admin\Product\UpdateProductRequest;
use App\Models\Item;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOffer;
use App\Tables\Items;
use App\Tables\Offers;
use App\Tables\Orders;
use Illuminate\Http\Request;

use App\Tables\Products;
use Illuminate\Contracts\Cache\Store;
use ProtoneMedia\Splade\Facades\Toast;

class ProductController extends Controller
{
    //

    public function index()
    {
        return view('products.index', [
            'products' => Products::class
        ]);
    }

    public function create()
    {


        $offers = \App\Models\Offer::join("businesses", "businesses.id", "offers.business_id")->where('offers.status', 'active')->where("expire_date", ">", \Carbon\Carbon::today())->select("offers.id", \DB::raw("CONCAT( offers.name  ,' - ',businesses.name) as name"))->pluck('name', 'id');
        return view('products.create', ['offers' => $offers]);
    }

    public function show(Product $product)
    {

        $product->order_count = $product->order()->count();

        return view(
            'products.show',
            //  compact("product")

            [
                "product" => $product,

                'orders' =>  new Orders(Order::orderBy("id", "desc")->with("product")->where("product_id", $product->id)->orderBy("id", "desc")),
                'offers' =>  new Offers(\App\Models\Offer::orderBy("id", "desc")->with("product")->whereHas("product", function ($q) use ($product) {
                    $q->where("product_id", $product->id);
                })->orderBy("id", "desc")),
            ]
        );
    }



    public function edit(Product $product)
    {
        $offers = \App\Models\Offer::join("businesses", "businesses.id", "offers.business_id")->where('offers.status', 'active')->where("expire_date", ">", \Carbon\Carbon::today())->select("offers.id", \DB::raw("CONCAT( offers.name  ,' - ',businesses.name) as name"))->pluck('name', 'id');

        $product->offers_ids = $product->offer()->pluck("offers.id");


        return view('products.edit', compact("product", "offers"));
    }

    function store(StoreProductRequest $request)
    {




        Product::create(["status" => "active"] + $request->validated());

        ProductOffer::insert(array_map(function ($offer_id) use ($request) {
            return [
                "offer_id" => $offer_id,
                "product_id" => Product::latest()->first()->id,
                "created_at" => now(),
                "updated_at" => now(),
            ];
        }, $request->offers_ids));

        Toast::title(__("all.added"))
            ->message(__("all.product.added"))
            ->success()
            ->rightTop()

            ->autoDismiss(15);
        return redirect()->route('products.index')
            ->with('success', __("all.product.added"));
    }

    function update(UpdateProductRequest $request, Product $product)
    {


        // check if new logo is uploaded 




        $product->update($request->validated());

        ProductOffer::where("product_id", $product->id)->delete();

        ProductOffer::insert(array_map(function ($offer_id) use ($request, $product) {
            return [
                "offer_id" => $offer_id,
                "product_id" => $product->id,
                "created_at" => now(),
                "updated_at" => now(),
            ];
        }, $request->offers_ids));

        Toast::title(__("all.updated"))
            ->message(__("all.product.updated"))
            ->success()
            ->rightTop()

            ->autoDismiss(3);
        return redirect()->route('products.index')
            ->with('success', __("all.product.updated"));
    }

    function updateStatus(StatusProductRequest $request, Product $product)
    {





        $product->update($request->validated());
        Toast::title(__("all.updated"))
            ->message(__("all.product.updated"))
            ->success()
            ->rightTop()

            ->autoDismiss(3);
        return redirect()->route('products.index')
            ->with('success', __("all.product.updated"));
    }

    function destroy(Product $product)
    {
        $product->delete();
        // Toast::title(__("all.deleted"))
        // ->message(__("all.product.deleted"))
        // ->success()
        // ->rightTop()
        // 
        // ->autoDismiss(15);
        return redirect()->route('products.index')
            ->with('success', __("all.product.deleted"));
    }
}
