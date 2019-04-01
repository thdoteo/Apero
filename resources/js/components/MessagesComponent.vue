<template>
    <div class="messages">
        <Message :message="message" v-for="message in messages" :key="message.id" :user="user"></Message>

        <div class="messages-new">
            {{ errors.content }}
            <input @keypress.enter="sendMessage" v-model="content" class="messages-new-message" :disabled="loading" autocomplete="off" placeholder="Say hello...">
        </div>
    </div>
</template>

<script>
    import Message from './MessageComponent'

    export default {
        props:{
            user: Number
        },
        data () {
            return {
                content: '',
                errors: {},
                loading: false
            }
        },
        components: { Message },
        computed: {
            messages: function () {
                return this.$store.getters.messages
            },
            count: function () {
                return this.$store.getters.count
            },
            lastMessage: function() {
                return this.messages[this.messages.length - 1]
            }
        },
        watch: {
            lastMessage: function () {
                this.scrollBottom()
            }
        },
        mounted () {
            this.loadMessages()
            this.$store.dispatch('setUser', this.user)
        },
        methods: {
            async onScroll () {
                if (window.scrollY === 0)
                {
                    this.loading = true
                    window.removeEventListener('scroll', this.onScroll)
                    let previousHeight = this.$el.scrollHeight

                    await this.$store.dispatch('loadPreviousMessages')

                    this.$nextTick(() => { window.scrollTo(0, this.$el.scrollHeight - previousHeight); })
                    if (this.messages.length < this.count)
                    {
                        window.addEventListener('scroll', this.onScroll)
                    }
                    this.loading = false
                }
            },
            scrollBottom() {
                this.$nextTick(() => {
                    window.scrollTo(0, this.$el.scrollHeight);
                })
            },
            async loadMessages() {
                await this.$store.dispatch('loadMessages')
                if (this.messages.length < this.count)
                {
                    window.addEventListener('scroll', this.onScroll)
                }
            },
            async sendMessage (e) {
                this.errors = {}
                this.loading = true
                try {
                    await this.$store.dispatch('sendMessage', {content: this.content})
                    this.content = ''
                } catch (response)
                {
                    if (response.errors) {
                        this.errors = response.errors
                    } else {
                        console.error(response);
                    }
                }
                this.loading = false

            }
        }
    }
</script>
