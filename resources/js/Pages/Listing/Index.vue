<template>
  <MainLayoutPage></MainLayoutPage>
  <Filters :filters="filters" />
  <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
    <Listing v-for="listing in listings.data" :key="listing.id" :listing="listing" >

    </Listing>

  </div>

  <div v-if="listings.data.length" class="w-full flex justify-center mt-4 mb-4">
    <Pagination :links="listings.links" />
</div>
<div v-for="item in listings.data" :key="item.id">
    <h4>{{ item }}</h4>
  </div>
</template>

<script setup>
import Listing from './Listing.vue'
import Pagination from './Pagination.vue'
import Filters from './Filters.vue'
import MainLayoutPage from '../../Layouts/MainLayoutPage.vue';
defineProps({
  listings: Object,
  filters: Object,
  listingImage :Object
})

</script>