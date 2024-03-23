<template >
  <main-layout-page></main-layout-page>
      <h1 class="text-3xl mb-4 ml-3">Deine Anzeigen</h1>
      <section>
      <!-- <RealtorFilters :filters="filters" /> -->
  </section>
  <div class="mx-6">
    <section class="grid grid-cols-1 lg:grid-cols-2 gap-2">
    <Box v-for="listing in listings.data" :key="listing.id">
      <div class="flex flex-col md:flex-row gap-2 md:items-center justify-between">
        <div :class="{ 'opacity-25': listing.deleted_at }">
          <div class="xl:flex items-center gap-2">
            <preis :preis="listing.preis" class="text-2xl font-medium" />
            <ListingSpace :listing="listing" />
          </div>

          <ListingAddress :listing="listing" />
        </div>
        <section>
          <div
            class="flex items-center gap-1 text-gray-600 dark:text-gray-300"
          >
          <a
            class="btn-outline text-xs font-medium" 
            :href="route('listing.show', { listing: listing.id })"
            target="_blank"
          >Vorschau</a>
          <Link class="btn-outline text-xs font-medium" 
          :href="route('dashboard.listing.edit', { listing: listing.id })">Bearbeiten</Link>

            <Link
              v-if="!listing.deleted_at"
              class="btn-outline text-xs font-medium"
              :href="route('dashboard.listing.destroy', { listing: listing.id })"
              as="button" method="delete"
            >
              Löschen
            </Link>

            <Link
              v-else class="btn-outline text-xs font-medium"
              :href="route('dashboard.listing.restore', { listing: listing.id })"
              as="button" method="put"
            >
              Restore
            </Link>
          </div>

          <div class="mt-2">
            <Link 
              :href="route('dashboard.listing.image.create', { listing: listing.id })" 
              class="block w-full btn-outline text-xs font-medium text-center"
            >
              Bilder ({{ listing.images_count }})
            </Link>
          </div>
        </section>
      </div>
    </Box>

  </section>
  <section v-if="listings.data.length" class="w-full flex justify-center mt-4 mb-4">
    <Pagination :links="listings.links" />
  </section>
  </div>

  <Footer  class="fixed bottom-0 w-full"></Footer>
</template>

<script setup>
import Footer from '../../Layouts/Footer.vue';
import MainLayoutPage from '../../Layouts/MainLayoutPage.vue';
import Pagination from '../Listing/Pagination.vue'
import ListingAddress from '../../Components/ListingAddress.vue'
import ListingSpace from '../../Components/ListingSpace.vue'
import Preis from '../../Components/Preis.vue';
import Box from  '../../Components/UI/Box.vue'
import RealtorFilters from './RealtorFilters.vue'
import { Link } from '@inertiajs/vue3'
defineProps({
  listings: Object,
  filters: Object,
})
</script>