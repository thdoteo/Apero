import Vue from 'vue'
window.io = require('socket.io-client')

import Messages from './components/MessagesComponent'
import Store from './store/store'

new Vue({
    el: '#app',
    components: { Messages },
    store: Store
})
