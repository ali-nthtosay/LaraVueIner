<!-- <template>
  <MainLayoutPage>
  </MainLayoutPage>
  <div class="grid grid-cols-3 md:grid-cols-2 xl:grid-cols-3 gap-4 mx-4">
    <Box v-for="item in listings" :key="item.id" >
      <div>
        <Link :href="`/listing/${item.id}`">
          <Price :price="item.price" class="text-2xl font-bold" />
          <ListingSpace :listing="item" class="text-lg" />
          <ListingAddress :element="item" class="text-gray-500" />
        </Link>
        <div>
          <button>
            <Link :href="`/listing/${item.id}/edit`">Edit</Link>
          </button>
        </div>
        <div>
          <button>
            <Link :href='`/listing/${item.id}`' method="DELETE"> Delete</Link>
          </button>
        </div>
      </div>
    </Box>
  </div>
</template>

<script setup>
import MainLayoutPage from '../../Layouts/MainLayoutPage.vue';
import ListingAddress from '../../Components/ListingAddress.vue';
import ListingSpace from '../../Components/ListingSpace.vue';
import Price from '../../Components/Price.vue';


import Box from  '../../Components/UI/Box.vue'
import { Link } from '@inertiajs/vue3';

defineProps({
  listings: Array,
});
</script> -->

<template>
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
    <Listing v-for="listing in listings.data" :key="listing.id" :listing="listing" />
  </div>

  <div v-if="listings.data.length" class="w-full flex justify-center mt-8 mb-8">
    <Pagination :links="listings.links" />
</div>
</template>

<script setup>
import Listing from './Listing.vue'
import Pagination from './Pagination.vue'
defineProps({
  listings: Object,
})

</script>