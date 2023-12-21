<?php

namespace App\Tables;

use App\Models\Item;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Items extends AbstractTable
{
    /**
     * Create a new instance.
     *
     * @return void
     */

     private $query;
    public function __construct(
        $query
    )
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
        return $this->query ??  Item::orderBy("id", "desc")->with("offer.business")  ;
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
            ->withGlobalSearch(columns: ['id', 'name', "offer_id", "expire_date", 'redeemed_date',    'status'])
            ->column('id', sortable: true)
            ->column('offer.name', sortable: true, label: __("all.label"), classes: "max-200")
            ->column('order.username', sortable: true, label: __("all.username"), classes: "max-200")
            // ->column('offer.business.name', label: __("all.business_name"))
            ->column('status', label: __("all.status"))
            ->column('offer.business_due', label: "مستحقات المتجر")
            ->column('expire_date', label: __("all.expiry_date"))
            ->column('redeemed_date', label: __("all.redeemed_date"))
            ->column('created_at', sortable: true, label: __("all.created_at"))

            ->column('actions', label: __("all.actions"), exportAs: false)


            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()


            ->export()
            ->paginate(50);
    }
}
