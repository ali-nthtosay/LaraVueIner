<template>
    <MainLayoutPage></MainLayoutPage>
    <Box>

        <div   v-for="listing in listings" :key="listing.id" :listing="listing"
        class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4"
        >

        <div >
            <Link :href="`/listing/${listing.id}`">
                <div class="flex items-center gap-1">
                    <Preis :preis="listing.preis" class="text-2xl font-bold" />
                </div>
            </Link>

            <ListingSpace :listing="listing" class="text-lg" />
            <ListingAddress :listing="listing" class="text-gray-500" />
            <div v-if="user.id !== listing.by_user_id" class="mr-2">
                <div>
                    <Button @click="toggleLike(listing.id)">
                        <Icon
                            name="heart-fill"
                        ></Icon>
                    </Button>
                </div>
            </div>
        </div>
 


        </div>
        
    </Box>
  </template>
  
  <script setup>
  import { Link, usePage, router } from "@inertiajs/vue3";
  import Listing from '../Listing/Listing.vue'
import ListingAddress from "../../Components/ListingAddress.vue";
import ListingSpace from "../../Components/ListingSpace.vue";
import Preis from "../../Components/Preis.vue";
import Box from "../../Components/UI/Box.vue";
import Icon from "../../Components/UI/Icon.vue";
import { ref, computed } from "vue";

  import MainLayoutPage from '../../Layouts/MainLayoutPage.vue';
  defineProps({
    listings: Object,
  
  })
  const page = usePage();
const user = computed(() => page.props.auth.user);
var liked = ref(true);
function toggleLike(id) {
    if (liked) {
        liked = !liked;
        router.delete(`/listing/${id}/like`, {}, { preserveScroll: true });
    } 
}
  </script>