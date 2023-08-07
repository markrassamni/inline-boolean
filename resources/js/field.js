import Detail from './components/DetailField'
import Index from './components/IndexField'
import Form from './components/FormField'

Nova.booting((app, store) => {
    app.component('index-inline-boolean', Index);
    app.component('detail-inline-boolean', Detail);
    app.component('form-inline-boolean', Form);
})
