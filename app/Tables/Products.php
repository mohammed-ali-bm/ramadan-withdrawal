<?php

namespace App\Tables;

use App\Models\Product;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Products extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the user is authorized to perform bulk actions and exports.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        return true;
    }

    /**
     * The resource or query builder.
     *
     * @return mixed
     */
    public function for()
    {
        return Product::orderBy("id", "desc")->withCount("offer");
    }

    /**
     * Configure the given SpladeTable.
     *
     * @param \ProtoneMedia\Splade\SpladeTable $table
     * @return void
     */
    public function configure(SpladeTable $table)
    {
        $table
            ->withGlobalSearch(columns: ['id', 'name',"business_due", "expire_date",'phone', 'address', 'status'])
            ->column('id', sortable: true)
            ->column('name', sortable: true, label: __("all.label"), classes: "max-200")
            ->column('price', label: __("all.price"))
            ->column('offer_count', label: __("all.purchase_count"))
            ->column('status', label: __("all.status"))
            ->column('expiry_date', label: __("all.expiry_date"))
            ->column('created_at', sortable: true, label: __("all.created_at"))

            ->column('actions', label: __("all.actions"), exportAs: false)


            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()


            ->export()
            ->paginate(50);
    }
}
