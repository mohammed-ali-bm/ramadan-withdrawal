<Link slideover class="action-icon  tooltip-trigger" data-tooltip-target="tooltip-view"
    href="{{ route('orders.show', ['order' => $order]) }}"><i class="fi fi-rr-globe"></i></Link>


<Link slideover class="action-icon yellow" data-tooltip-target="tooltip-edit"
    href="{{ route('orders.edit', ['order' => $order]) }}"><i class="fi fi-rr-edit"></i></Link>


<x-splade-form action="{{ route('orders.status', ['order' => $order]) }}" method="PUT">


    @if ($order->status != 'active')
        <button class="action-icon green " data-tooltip-target="tooltip-set-active" type="submit" name="status"
            value="active" title="{{ __('all.set_active') }}"><i class="fi fi-rr-eye"></i></button>
    @endif
    @if ($order->status != 'inactive')
        <button class="action-icon  " type="submit" data-tooltip-target="tooltip-set-inactive" name="status"
            value="inactive" title="{{ __('all.set_inactive') }} "><i class="fi  fi-rr-eye-crossed"></i></button>
    @endif




</x-splade-form>

<x-splade-form action="{{ route('orders.destroy', ['order' => $order]) }}" method="DELETE">
    <button class="action-icon red " data-tooltip-target="tooltip-delete" type="submit"><i
            class="fi fi-rr-trash"></i></button>

</x-splade-form>
