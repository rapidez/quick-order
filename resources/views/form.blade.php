@extends('rapidez::layouts.app')

@section('content')
    <quick-order v-slot="quickOrder">
        <div class="md:container">
            <h1 class="font-bold text-xl mb-5 max-md:px-5 md:text-2xl">
                @lang('Order via item number')
            </h1>
            <div class="flex gap-x-6 gap-y-4 max-lg:flex-col">
                @include('rapidez-quick-order::partials.sku-list')
                @include('rapidez-quick-order::partials.csv-upload')
            </div>
            <div class="mt-4 max-md:px-5">
                <x-rapidez::button.conversion
                    type="button"
                    v-on:click="quickOrder.addAllToCart"
                    v-bind:class="{'button-loading': quickOrder.adding.length > 0}"
                    v-bind:disabled="quickOrder.adding.length > 0"
                >
                    @lang('Add all to cart')
                </x-rapidez::button.conversion>
            </div>
        </div>
    </quick-order>
@endsection
