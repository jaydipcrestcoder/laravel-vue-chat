 <!-- resources/views/chat.blade.php -->
 @extends('layouts.app')
 @section('content')
 <div class="container">
     <div class="messaging">
         <div class="inbox_msg">
             <div class="inbox_people">
                 <div class="headind_srch">
                     <div class="recent_heading">
                         <h4>Users in Chat</h4>
                     </div>

                 </div>
                 <div class="inbox_chat">
                     <chat-users :users="users" v-on:fetchMessagesUser="fetchMessagesUser" :loggedinuser="{{ Auth::user() }}"></chat-users>
                 </div>
             </div>
             <div class="mesgs">
                 <div class="msg_history">                     
                     <chat-messages-multiple :messages="messages" :user="{{ Auth::user() }}"></chat-messages-multiple>
                 </div>
                 <div class="type_msg">
                     <div class="input_msg_write">
                        <chat-form v-on:messagesent="addMessage" :user="{{ Auth::user() }}"></chat-form>
                     </div>
                 </div>
             </div>
         </div>
     </div>   
 </div>
 @endsection