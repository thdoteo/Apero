import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const get = async function (url) {
    let response = await fetch(url, {
        credentials: 'same-origin',
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        }
    })

    if (response.ok)
    {
        return response.json()
    }
    else
    {
        let error = await response.json()
        throw new Error(error.message)
    }
}

export default new Vuex.Store({
    strict: true,
    state: {
        user: null,
        messages: {}
    },
    getters: {
        user: function (state)
        {
            return state.user
        },
        messages: function (state)
        {
            return state.messages
        }
    },
    mutations: {
        setUser: function (state, user)
        {
            state.user = user
        },
        addMessages: function (state, messages)
        {
            let result = {}
            messages.messages.forEach(function (message) {
                result[message.id] = message
            })
            console.log(result)
            state.messages = result
        }
    },
    actions: {
        loadMessages: async function (context) {
            let response = await get('/api/messages')
            context.commit('addMessages', {messages: response.messages})
        }
    }
})
