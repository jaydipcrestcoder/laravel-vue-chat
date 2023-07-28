<template>
    <div>
        <div v-for="user in users" :key="user.id">
            <div v-if="user.id != loggedinuser.id">
                <div class="chat_list" >
                    <div class="chat_people">
                        <div class="chat_ib">
                            <h5 :id="user.id" :data-loggedinuser="loggedinuser.id" @click="addClass">{{ user.name }} ({{ user.email }})</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ["users", "loggedinuser"], 
    methods: {
        addClass(event) {
            //console.log(event);
            axios.get('/messages?id='+event.currentTarget.id+'&lid='+event.currentTarget.dataset.loggedinuser).then(response => {
                //Save the response in the messages array to display on the chat view
                console.log(response.data);
                this.$emit('fetchMessagesUser',response.data);
            });            
        }
    }
};
</script>

