import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

import TransportComponent from './components/TransportComponent'
import TransportViewComponent from './components/TransportViewComponent'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/home/',
            alias: '/',
            name: 'transport',
            component: TransportComponent
        },
        {
            path: '/home/transport/:id',
            name: 'transport-view',
            component: TransportViewComponent,
            props: true
        }
    ],
});

const app = new Vue({
    el: '#app',
    router
});