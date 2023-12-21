<?php

namespace App\Tables;

use App\Models\Business;
use Illuminate\Http\Request;
use ProtoneMedia\Splade\AbstractTable;
use ProtoneMedia\Splade\SpladeTable;

class Businesses extends AbstractTable
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
        return Business::withCount('offer')->orderBy("id", "desc");
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
            ->withGlobalSearch(columns: ['id', 'name', 'phone', 'address', 'status'])
            ->column('id', sortable: true)
            ->column('logo', sortable: false, label: __("all.logo") , exportAs: false)
            ->column('name', sortable: true, label: __("all.name") , classes:  "max-200" )
            ->column('phone', label: __("all.phone"))
            ->column('offer_count', label: __("all.offers_count"))
            ->column('status', label: __("all.status"))
            ->column('created_at', sortable: true, label: __("all.created_at"))

            ->column('actions', label: __("all.actions"), exportAs: false)


            // ->searchInput()
            // ->selectFilter()
            // ->withGlobalSearch()

            ->bulkAction($label = __("all.delete"), $action = function (Business $business) {
                $business->delete();
            })
            ->export()
            ->paginate(50);
    }
}
