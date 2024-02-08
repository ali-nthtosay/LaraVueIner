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
          <ListingSpace :listing="listing" class="text-lg" />
          <ListingAddress
            :listing="listing"
            class="text-gray-500"
          />
        </Link>
      </div>
      <div>
        <Link
        :href="`/listing/${listing.id}/edit`"
        >
          Edit
        </Link>
      </div>
      <div>
        <Link
        :href='`/listing/${listing.id}`'
          method="DELETE" as="button"
        >
          Delete
        </Link>
      </div>
    </Box>
  </template>
  
  <script setup>
  import { Link } from '@inertiajs/vue3'
  const props = defineProps({listing: Object})
  import ListingAddress from '../../Components/ListingAddress.vue'
import ListingSpace from '../../Components/ListingSpace.vue'
import Price from '../../Components/Price.vue';
import Box from  '../../Components/UI/Box.vue'
  
  </script>