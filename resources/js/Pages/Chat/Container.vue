<template>
    <div class="flex justify-center pt-10 ">
        <h3 class="font-semobold text-xl text-white-800 leading-tight">Chat Container</h3>
    </div>
    <div class="flex justify-center pt-10 ">
        <h3 class="font-semobold text-xl text-white leading-tight">
            
            <chat-room-selection 
            v-if="currentRoom.id" :rooms="chatRooms"
            :currentRoom="currentRoom"
            v-on:roomchanged="setRoom($event)"
            />
        </h3>
    </div> 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <message-container :messages = "messages" />
                <input-message :room="currentRoom" v-on:messagesent="getMessages()" />
            </div>
        </div>

    </div>

</template>

<script >
    import MessageContainer from './messageContainer.vue';
    import InputMessage from './inputMessage.vue';

import axios from 'axios';
import ChatRoomSelection from './chatRoomSelection.vue';
export default {
    components:{
        MessageContainer,
        InputMessage,
        ChatRoomSelection
    },
    data: function(){
        return {
            chatRooms: [],
            currentRoom: [],
            messages: []
        }
    },
    // watch:{
    //     currentRoom(){
    //         this.connect();
    //     }
    // },
    methods:{
        // connect(){
        //     if(this.currentRoom.id){
        //         let vm = this;
        //         this.getMessages();
        //         window.Echo.private("chat." + this.currentRoom.id)
        //         .listen('.message.new',e => {
        //             vm.getMessages();
        //         })
        //     }
        // },
        getRooms(){
            axios.get('/chat/rooms')
            .then(response =>
                {this.chatRooms = response.data;
                this.setRoom(response.data[0]);
            })
            .catch(error => {
                console.log(error);
            })
        },
        setRoom(room){
            this.currentRoom = room;
            this.getMessages();
        },
        getMessages(){
            axios.get('/chat/room/' + this.currentRoom.id + '/messages' )
            .then(response => {
                this.messages = response.data ;
            })
            .catch(error => {
                console.log(error) ;
            })
        }

    },
    created() {
            this.getRooms();
    }
}
</script>