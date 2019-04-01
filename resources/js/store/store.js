import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const api = async function (url, options = {}) {
    let response = await fetch(url, {
        credentials: 'same-origin',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        ...options
    })

    if (response.ok)
    {
        return response.json()
    }
    else
    {
        throw await response.json()
    }
}

export default new Vuex.Store({
    strict: true,
    state: {
        user: null,
        messages: [],
        count: 0
    },
    getters: {
        user: function (state) {
            return state.user
        },
        messages: function (state) {
            return state.messages
        },
        count: function (state) {
            return state.count
        }
    },
    mutations: {
        setUser: function (state, user) {
            state.user = user
        },
        addMessages: function (state, {messages, count}) {
            state.count = count
            state.messages = messages
        },
        addMessage: function (state, {message}) {
            state.count++
            state.messages.push(message)
        },
        prependMessages: function (state, {messages}) {
            state.messages = [...messages, ...state.messages]
        }
    },
    actions: {
        loadMessages: async function (context) {
            let response = await api('/api/messages')
            context.commit('addMessages', {messages: response.messages, count: response.count})
        },
        loadPreviousMessages: async function (context) {
            let message = context.getters.messages[0]
            if (message)
            {
                let response = await api('/api/messages?before=' + message.created_at)
                context.commit('prependMessages', {messages: response.messages})
            }
        },
        sendMessage: async function (context, {content}) {
            let response = await api('/api/messages', {
                method: 'POST',
                body: JSON.stringify({
                    content: content
                })
            })
            context.commit('addMessage', {message: response.message})
        }
    }
})
