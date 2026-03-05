<div class="bg rounded p-5 flex flex-col flex-1">
    <div class="font-bold mb-4">@lang('Add products individually')</div>
    <div v-bind:key="quickOrder.productCount">
        <div class="flex items-center gap-x-2 text-sm font-bold text-left mb-4">
            <div class="max-sm:flex-1 sm:w-1/2">@lang('SKU')<span class="text-danger">*</span></div>
            <div class="max-sm:flex-1 sm:w-1/4">@lang('Quantity')<span class="text-danger">*</span></div>
            <div
                v-if="quickOrder.getProductOptions(productId)?.length"
                class="max-sm:flex-1 sm:w-1/4"
                v-cloak
            >
                @lang('Product options')
                <span class="text-danger">*</span>
            </div>
            <div class="w-[68px]"></div>
        </div>
        <div class="flex flex-col gap-4 min-h-56">
            <template v-for="product, productId in quickOrder.products">
                @include('rapidez-quick-order::partials.product-line')
            </template>
        </div>
        <button v-on:click="quickOrder.newProduct()" class="text-sm mt-4 hover:underline">
            @lang('New line')
        </button>
    </div>
</div>