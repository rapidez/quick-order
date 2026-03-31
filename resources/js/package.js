import { defineAsyncComponent } from 'vue'

document.addEventListener('vue:loaded', function (event) {
    const vue = event.detail.vue
    vue.component('quick-order', defineAsyncComponent(() => import('./components/QuickOrder.vue')))
})
