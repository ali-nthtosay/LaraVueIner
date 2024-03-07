<template>
    <Box>
      <div>
        <Link
          :href="`/listing/${listing.id}`"
        >
          <div class="flex items-center gap-1">
            <Price
              :price="listing.price"
              class="text-2xl font-bold"
            />
            
          </div>
        </Link>

          <ListingSpace :listing="listing" class="text-lg" />
          <ListingAddress
            :listing="listing"
            class="text-gray-500"
          />
        <div v-if="user.id == listing.by_user_id">
          <button @click="toggleButton" :class="{ 'unlike-btn': isButtonActive, 'like-btn': !isButtonActive }">
        {{ isButtonActive ? 'Unlike it' : 'Like it' }}
      </button>
      <button >Like</button>
        </div>
      </div>
      
    </Box>
  </template>
  
  <script setup>
  import { Link, usePage, useForm} from '@inertiajs/vue3'
  const props = defineProps({listing: Object})
  import ListingAddress from '../../Components/ListingAddress.vue'
  import ListingSpace from '../../Components/ListingSpace.vue'
  import Price from '../../Components/Price.vue'
  import Box from  '../../Components/UI/Box.vue'
  import {ref, computed} from 'vue'
  const isButtonActive = ref(false);
  
  // const toggleButton = () => {
  //   isButtonActive.value = !isButtonActive.value;
  // }

  const toggleButton = async () => {
  isButtonActive.value = !isButtonActive.value;

};

  const page = usePage();
  const user = computed(() => page.props.auth.user);


  </script>

  

<style>
.like-btn {
  /* Add your styling for the like icon here */
  background-color: green; /* Example background color */
  color: white; /* Example text color */
  font-size: 1.5rem; /* Example font size */
  margin-left: 5px; /* Example margin */
}
.unlike-btn {
  /* Add your styling for the like icon here */
  background-color: red; /* Example background color */
  color: white; /* Example text color */
  font-size: 1.5rem; /* Example font size */
  margin-left: 5px; /* Example margin */
}
</style>