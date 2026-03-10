<div>
    <div v-for="error in quickOrder.errors(productId)" class="text-danger">
        @{{ error }}
    </div>
    <div class="flex gap-x-2">
        <x-rapidez::input
            name="sku"
            v-bind:value="product.sku"
            v-bind:class="{'text-danger': quickOrder.errors(productId).length}"
            v-on:change="(event) => quickOrder.updateProduct(productId, event.target.value)"
            class="h-8 text-sm p-2 sm:w-1/2"
            required
        />
        <x-rapidez::input
            type="number"
            name="quantity"
            v-model.lazy="product.quantity"
            class="h-8 text-sm p-2 sm:w-1/4"
            required
        />
        <div v-if="quickOrder.getProductOptions(productId)?.length" class="flex flex-col w-1/4 gap-y-2">
            <div v-for="option, optionId in quickOrder.getProductOptions(productId)">
                <template v-if="false"></template>
                @include('rapidez-quick-order::options.field')

                @unless (app()->environment('production'))
                    <label v-else>
                        <x-rapidez::label>@{{ option.title }}</x-rapidez::label>
                        <div class="text-danger">@{{ option.__typename }}</div>
                    </label>
                @endunless
            </div>
        </div>
        <div class="flex items-center mt-auto gap-x-2">
            <x-rapidez::button.conversion
                class="min-h-0 h-8 px-2.5 shrink-0"
                v-on:click="quickOrder.addOneToCart(productId)"
                v-bind:class="{'button-loading': quickOrder.adding.includes(productId)}"
                v-bind:disabled="quickOrder.errors(productId).length > 0 || quickOrder.adding.includes(productId)"
            >
                <x-heroicon-s-shopping-cart class="size-4"/>
            </x-rapidez::button.conversion>
            <div class="w-6">
                <button v-if="product.sku && !quickOrder.errors(productId).length > 0 " class="size-6 group" v-on:click="quickOrder.deleteProduct(productId)">
                    <x-heroicon-s-trash class="text-muted group-hover:text-danger"/>
                </button>
            </div>
        </div>
    </div>
</div>
