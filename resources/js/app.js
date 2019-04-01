import Vue from 'vue'
import VueRouter from 'vue-router'
import Messages from './components/MessagesComponent'
import Store from './store/store'

Vue.use(VueRouter)

const routes = [
    { path: '/' },
    { path: '/profile', name: 'profile' }
]

const router = new VueRouter({
    mode: 'history',
    routes,
    base: '/'
})

new Vue({
    el: '#app',
    components: { Messages },
    store: Store
})
