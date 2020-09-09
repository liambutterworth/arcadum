//
// Main
//

import Vue from 'vue';
import VueRouter from 'vue-router';
import Axios from 'axios';

Vue.component('app-container', require('components/App/Container').default);
Vue.use(VueRouter);

Vue.prototype.$api = Axios.create({
    baseUrl: 'http://localhost:8080/api',

    headers: {
        'X-Requested-With': 'XMLHttpRequest',
    },
});

export const router = new VueRouter({
    mode: 'history',
    routes: require('js/routes').default,
});

export const app = new Vue({
    el: '#app',
    router: router,
});
