<template>
  <div v-if="user">

  <MainLayoutPage></MainLayoutPage>
 <div class="ml-10">
  <Filters :filters="filters"  />
 </div>
  
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 overflow-x-hidden">
    <Listing v-for="listing in listings.data" :key="listing.id" :listing="listing" >

    </Listing>

  </div>

  <div v-if="listings.data.length" class="w-full flex justify-center mt-4 mb-4">
    <Pagination :links="listings.links" />
</div>
  </div>

  <div v-else >
    <NavBar :isListingPage="false" ></NavBar>
    <Filters :filters="filters" />
  <div 
   class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 overflow-x-hidden">

    <div v-for="listing in listings.data" :key="listing.id" :listing="listing"
     class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 box overflow-x-hidden mx-5">

        <div v-if="listing.images.length > 0" class="flex flex-column">
        <img class="rounded-t-lg w-full h-48 object-cover" :src="listing.images[0].src" alt="Image" />
        </div>
        <div v-else>
            <img class="rounded-t-lg w-full h-48 object-cover " src="../../Components/Images/no-image.jpg" alt="Image" />
        </div>

        <div class="p-5">
            <Preis :preis="listing.preis" class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white" />
      <ListingAddress :listing="listing" class="mb-3 font-normal text-gray-700 dark:text-gray-400" />
        <ListingSpace :listing="listing" class="mb-3 font-normal text-gray-400 dark:text-gray-300" />

    </div>
</div>
  </div>

  <div v-if="listings.data.length" class="w-full flex justify-center mt-4 mb-4">
    <Pagination :links="listings.links" />
</div>
  </div>
  <Footer  class="fixed bottom-0 w-full"></Footer>
</template>

<script setup>
import NavBar from "../../Layouts/NavBar.vue";
import Footer from "../../Layouts/Footer.vue";
import Listing from './Listing.vue'
import Pagination from './Pagination.vue'
import Filters from './Filters.vue'
import MainLayoutPage from '../../Layouts/MainLayoutPage.vue';
import ListingAddress from "../../Components/ListingAddress.vue";
import ListingSpace from "../../Components/ListingSpace.vue";
import Preis from "../../Components/Preis.vue";
defineProps({
  listings: Object,
  filters: Object,
  listingImage :Object
})
import { computed, ref } from "vue";
const isListingPage = ref(false);
import { usePage } from "@inertiajs/vue3";
const page = usePage();

const user = computed(() => page.props.auth.user);

</script>