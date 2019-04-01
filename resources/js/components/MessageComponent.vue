<template>
    <div :class="messageClass">
        <div class="message-avatar" :style="applyUserColors">{{ message.user.letter }}</div>
        <div class="message-content" :style="applyUserColors">{{ message.content }}</div>
        <div class="message-date">{{ ago }}</div>
    </div>
</template>

<script>
    import moment from 'moment'

    export default {
        props: {
            message: Object,
            user: Number
        },
        computed: {
            ago () {
                return moment(this.message.created_at).fromNow()
            },
            messageClass () {
                let classList = ['message']
                if (this.user === this.message.user.id)
                {
                    classList.push('message_own')
                }
                return classList
            },
            applyUserColors () {
                return 'color: ' + this.message.user.color +
                    '; background: ' + this.message.user.colorLight + ';'
            }
        }
    }
</script>
