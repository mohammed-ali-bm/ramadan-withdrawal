<?php

namespace App\Tables;

use App\Models\Order;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Orders extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */
    private $query ;
    public function __construct( $query = null)
    {
        $this->query = $query;
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
        return  $this->query ??   Order::orderBy("id", "desc")->with("product");
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
            ->withGlobalSearch(columns: ['id', 'name',"product_id", "store_order_id",'username', 'mobile',  "store_order_id", 'status'])
            ->column('id', sortable: true)
            ->column('username', sortable: true, label: __("all.username"), classes: "max-200")
            ->column('product.name', label: __("all.product_name"))
            ->column('status', label: __("all.status"))
            ->column('product.expire_date', label: __("all.expiry_date"))
            ->column('created_at', sortable: true, label: __("all.created_at"))

            ->column('actions', label: __("all.actions"), exportAs: false)


            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()


            ->export()
            ->paginate(50);
    }
}
