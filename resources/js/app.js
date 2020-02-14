import Vue from 'vue';
import router from './router.js';
// import LoadScript from 'vue-plugin-load-script';
import { Form, HasError, AlertError } from 'vform'
 
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
 
 
//   Vue.use(LoadScript);
require('./bootstrap');
window.Form = Form;
window.Vue = require('vue');
//REGISTER COMPONENTNS
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('app-header', require('./components/header.vue').default);
Vue.component('app-nav', require('./components/menu.vue').default);


const app = new Vue({
    el: '#app',
    router
});