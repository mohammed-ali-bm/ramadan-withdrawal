<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Item\StatusItemRequest;
use App\Http\Requests\Admin\Item\StoreItemRequest;
use App\Http\Requests\Admin\Item\UpdateItemRequest;
use App\Models\Item;
use Illuminate\Http\Request;

use App\Tables\Items;
use Illuminate\Contracts\Cache\Store;
use ProtoneMedia\Splade\Facades\Toast;

class ItemController extends Controller
{
    //



  
    public function index()
    {
        return view('items.index', [
            'items' => Items::class
        ]);
    }

    public function show(Item $item)
    {

        return view('items.show', compact("item"));
    }



    function updateStatus(StatusItemRequest $request, Item $item)
    {





        $item->update($request->validated());
        Toast::title(__("all.updated"))
            ->message(__("all.item.updated"))
            ->success()
            ->rightTop()

            ->autoDismiss(3);
        return redirect()->route('items.index')
            ->with('success', __("all.item.updated"));
    }

    function destroy(Item $item)
    {
        $item->delete();
        // Toast::title(__("all.deleted"))
        // ->message(__("all.item.deleted"))
        // ->success()
        // ->rightTop()
        // 
        // ->autoDismiss(15);
        return redirect()->route('items.index')
            ->with('success', __("all.item.deleted"));
    }
}
