import Vue from 'vue';
import VueRouter from 'vue-router';
import Axios from 'axios';
import AdminLayout from 'layouts/Admin/Layout';
import MainLayout from 'layouts/Main/Layout';
import routes from 'js/routes';

Vue.prototype.$api = Axios.create({
    baseURL: 'http://localhost:8080/api/',

    headers: {
        'X-Requested-With': 'XMLHttpRequest',
        'Accept': 'application/json',
    },
});

Vue.component('admin-layout', AdminLayout);
Vue.component('main-layout', MainLayout);
// Vue.component('app-container', AppContainer);
Vue.use(VueRouter);

export const router = new VueRouter({
    mode: 'history',
    routes: routes,
});

export const app = new Vue({
    el: '#app',
    router: router,
});
