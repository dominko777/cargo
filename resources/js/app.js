require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'
import Transportations from './components/Transportations'

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            component: Transportations,
            children: [
                {
                  path: 'from/:from',
                  component: Transportations
                },
                {
                   path: ':lang',
                   component: Transportations
                },
                {
                    path: ':lang/from/:from',
                    component: Transportations
                }
            ]
        }
    ],
})

const app = new Vue({
    el: '#app',
    components: { Transportations },
    router
});
