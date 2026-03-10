<template v-else-if="option.__typename == 'CustomizableFieldOption'">
    <x-rapidez::input
        v-bind:maxlength="option.value.max_characters"
        v-bind:required="option.required"
        v-model.lazy="quickOrder.enteredOptions[productId][optionId]"
        v-bind:placeholder="option.title"
        class="h-8"
    />
</template>
