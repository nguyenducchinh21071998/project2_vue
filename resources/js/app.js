require('./bootstrap');
import 'bootstrap/dist/css/bootstrap.css';
import router from './route';
import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
import App from './App.vue';
import FlashMessage from '@smartweb/vue-flash-message';
axios.defaults.baseURL = 'http://127.0.0.1:8000/api';
Vue.use(FlashMessage);
Vue.use(BootstrapVue);
const app = new Vue({
    el: '#app',
    router,
    render: h => h(App)
});
