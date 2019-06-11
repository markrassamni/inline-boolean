Nova.booting((Vue, router, store) => {
    Vue.component('index-inline-boolean', require('./components/IndexField'))
    Vue.component('detail-inline-boolean', require('./components/DetailField'))
    Vue.component('form-inline-boolean', require('./components/FormField'))
})
