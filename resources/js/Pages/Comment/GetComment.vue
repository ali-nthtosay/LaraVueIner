<template>
    <div class="border border-gray-300 p-4 rounded-lg max-w-xl mx-auto mt-40">
      <h2 class="text-lg font-medium mb-2">Leave a comment</h2>
      <div class="mb-4" v-for="item in listing" :key="item.id">
        <h5 class="block text-gray-700 font-medium mb-2" for="comment">
          Listing ID: {{ item.id }} & User ID: {{ item.by_user_id }}
        </h5>
      </div>
    </div>    
    <div class="border border-gray-300 p-4 rounded-lg max-w-xl mx-auto mt-40">
      <h2 class="text-lg font-medium mb-2">Leave a comment</h2>
      <form @submit.prevent="submitForm">
        <div class="mb-4">
          <label class="block text-gray-700 font-medium mb-2" for="name">Name</label>
          <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-gray-500"
                 id="name" type="text" placeholder="">
        </div>
        <div class="mb-4">
          <label class="block text-gray-700 font-medium mb-2" for="comment">Comment</label>
          <textarea rows="4" v-model="form.comment"
                    class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-gray-500"
                    id="comment" placeholder="Enter your comment"></textarea>
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
  import { useForm } from '@inertiajs/vue3';
  import axios from 'axios';
//   import { ref } from "vue";

  defineProps({
    listing: Object
  });
//   var id = ref(listing.id);

  const form = useForm({
    comment: '',
  });
  
  const submitForm = async () => {
    try {
      await axios.post(`/comment/store/`, {
        comment: form.comment,

        // listing_id: id 
      });
      console.log(form);
      form.comment = '';

    } catch (error) {
      console.error('Error submitting comment:', error);
    }
  };
  </script>
  