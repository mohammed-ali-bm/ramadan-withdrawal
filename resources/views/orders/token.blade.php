@extends('layouts.frontend.app')
@section('content')
    

<div class="page-container">
    <div class="py-12 app-layout">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
    
    
    
                    @if (!$order)
                        <p class="error-message">{{ __('all.code_not_found') }}</p>
                    @else
    
                    <h3 class="section-title"> {{ __("all.qr.congrats") }}</h3>
                    <div class="qr-code-wrapper">{!!  QrCode::size(600)->generate(route("orders.redeem", $order->token)) !!}</div>
    
                    <h3 class="section-title"> {{ __("all.qr.offers_detials") }}</h3>
    
                    <div class="item-container">
                   @foreach ($items as $item)
    
                   <div class="item-list-item {{ $item->redeemed_date != null ? "redeemed" : "active"   }}">
                        <img src="{{ asset('images/' . $item->offer->business->logo) }}" alt="{{ $item->offer->business->name }}" class="">
                        <div class="item-detials">
                            <div class="item-offer-name">
                                <h4>{{ $item->offer->name  }}</h4>
                                <p> <i class="fi fi-rr-marker"></i>{{ $item->offer->business->address }}</p>
    
                            </div>
                            <div>
                                <p class="{{ $item->redeemed_date != null ? "error-message" : "success-message"   }}">{{ $item->redeemed_date != null ? "تم الإستخدام في " . $item->redeemed_date : "ينتهي بعد " .daysLeft($item->order->expire_date) . " يوم "  }}</p>
                            </div>
                        </div>
    
                    </div>
    
                   @endforeach
                </div>
    
                    @endif
    
    
    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection