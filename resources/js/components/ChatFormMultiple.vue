<template>
    <input type="text" id="btn-input" class="write_msg" placeholder="Type a message"  v-model="newMessage" @keyup.enter="sendMessage" />
    <button class="msg_send_btn" type="button" @click="sendMessage">Send</button>
</template>
<script>
export default {
    //Takes the "user" props from <chat-form> … :user="{{ Auth::user() }}"></chat-form> in the parent chat.blade.php.
    props: ["user"],
    data() {
        return {
            newMessage: "",
        };
    },
    methods: {
        sendMessage() {
            //Emit a "messagesent" event including the user who sent the message along with the message content
            this.$emit("messagesent", {
                user: this.user,
                //newMessage is bound to the earlier "btn-input" input field
                message: this.newMessage,
            });
            //Clear the input
            this.newMessage = "";
        },
    },
};
</script>
