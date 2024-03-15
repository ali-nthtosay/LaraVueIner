<template>

    <MainLayoutPage></MainLayoutPage>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4 mx-4 ">
    <Box class="md:col-span-7 flex items-center ">
            <div v-if="listing.images.length" class="grid grid-cols-2 gap-1">
                <img
                    v-for="image in listing.images"
                    :key="image.id"
                    :src="image.src"
                    class="w-32 h-32 object-cover "
                    alt="Listing Image"
                />
            </div>
            <div v-else class="w-full text-center font-medium text-gray-500">No images</div>
        </Box>
    <div class="md:col-span-5 flex flex-col gap-4">
      <Box>

        <Price :price="listing.price" class="text-2xl font-bold" />
        <ListingSpace :listing="listing" class="text-lg" />
        <ListingAddress :listing="listing" class="text-gray-500" />
      </Box>

      <Box>
        <div>Weitere Informationen </div>
      </Box>

    </div>

    </div>


    <div class="border border-gray-300 p-4 rounded-lg max-w-xl mx-auto mt-40">
      <h2 class="text-lg font-medium mb-2">Leave a comment</h2>
      <div class="mb-4" >
        <h5 class="block text-gray-700 font-medium mb-2" for="comment" :listing="listing">
          Listing ID: {{ listing.id }} & User ID: {{ user.id }}
        </h5>
      </div>
    </div>    
    <div class="border border-gray-300 p-4 rounded-lg max-w-xl mx-auto mt-40">
      <h2 class="text-lg font-medium mb-2">Leave a comment on </h2>
      <form @submit.prevent="submitForm" v-on:keyup.enter.prevent="submitForm">

        <div class="mb-4">

        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-medium mb-2" for="name">Name</label>
          <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-gray-500" readonly
                 id="name" type="text" :value=listing.owner.name >
        </div>
        <label class="block text-gray-700 font-medium mb-2" for="name">E-mail</label>
          <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-gray-500" 
                 id="name" type="email" v-model="form.senderEmail" >
        <div class="mb-4">
          <label class="block text-gray-700 font-medium mb-2" for="name">Telephone</label>
          <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-gray-500" 
                 id="name" type="text" v-model="form.senderTelephone" >
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-medium mb-2" for="comment">Comment</label>
          <textarea rows="4" v-model="form.comment"
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-gray-500"
                    id="comment" placeholder="Enter your comment" ></textarea>
        </div>
        <div class="flex justify-end">
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Post Comment
          </button>
        </div>
      </form>
    </div>
    
</template>

<script setup>
import Icon from "../../Components/UI/Icon.vue";
import GetComment from "../Comment/GetComment.vue";
import AddComment from "../Comment/AddComment.vue"
import ListingAddress from '../../Components/ListingAddress.vue'
import MainLayoutPage from '../../Layouts/MainLayoutPage.vue'
import ListingSpace from '../../Components/ListingSpace.vue'
import Price from '../../Components/Price.vue';
import Box from  '../../Components/UI/Box.vue'
import { ref , computed} from "vue";
import {  router , usePage,useForm} from "@inertiajs/vue3";
import AddCommentVue from "../Comment/AddComment.vue";
const page = usePage();

const user = computed(() => page.props.auth.user);
  import axios from 'axios';
//   import { ref } from "vue";

  const props = defineProps({
    listing: Array
  });

  const form = useForm({
    senderEmail: '',
    senderTelephone: '',
    comment: '',
    listing_id : null
  });
  
  const submitForm = async () => {
    try {
      await axios.post('/comment/store/', {
        senderEmail: form.senderEmail,
        senderTelephone: form.senderTelephone,
        comment: form.comment,
        listing_id: props.listing.id

      });
      console.log(form);
      form.comment = '';
      form.senderEmail ='',
      form.senderTelephone = '',
      form.listing_id = null;

    } catch (error) {
      console.error('Error submitting comment:', error);
    }
  };
</script>