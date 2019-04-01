<template>
    <div class="messages">
        <Message :message="message" v-for="message in messages" :key="message.id" :user="user"></Message>
    </div>
</template>

<script>
    import Message from './MessageComponent'

    export default {
        props:{
            user: Number
        },
        components: { Message },
        computed: {
            messages: function () {
                return this.$store.getters.messages
            }
        },
        mounted () {
            this.$store.dispatch('loadMessages')
            this.$store.commit('setUser', this.user)
        }
    }
</script>
