// resources/js/components/ChatMessages.vue
<template>
    <div>
        <div v-for="message in messages" :key="message.id">
            <div v-bind:class="(message.user_id == user.id) ? 'incoming_msg' : 'outgoing_msg'">
                <div class="received_msg">
                    <div v-bind:class="(message.user_id == user.id) ? 'sent_msg' : 'received_withd_msg'">
                        <p> {{ message.message }}</p>
                        <span class="time_date"> {{ message.user.name }} | {{ message.created_at_formatted }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    props: ["messages", "user"],
};
</script>
