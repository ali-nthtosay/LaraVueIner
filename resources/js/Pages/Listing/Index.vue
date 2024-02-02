<template>
  <MainLayoutPage>
  </MainLayoutPage>
  <div class="grid grid-cols-3 md:grid-cols-2 xl:grid-cols-3 gap-4 mx-4">
    <Box v-for="item in listings" :key="item.id" >
      <div>
        <Link :href="`/list/${item.id}`">
          <Price :price="item.price" class="text-2xl font-bold" />
          <ListingSpace :listing="item" class="text-lg" />
          <ListingAddress :element="item" class="text-gray-500" />
        </Link>
        <div>
          <button>
            <Link :href="`/list/${item.id}/edit`">Edit</Link>
          </button>
        </div>
        <div>
          <button>
            <Link :href='`/list/${item.id}`' method="DELETE"> Delete</Link>
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
</script>

