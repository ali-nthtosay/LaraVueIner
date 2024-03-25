<template>
    <MainLayoutPage></MainLayoutPage>
    <div v-if="listings.lengths" 
   class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 overflow-x-hidden">

    <div v-for="listing in listings" :key="listing.id" :listing="listing"
     class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 box overflow-x-hidden mx-5">

        <div v-if="listing.images > 0" class="flex flex-column">
        <img class="rounded-t-lg w-full h-48 object-cover" :src="listing.images[0].src" alt="Image" />
        </div>
        <div v-else>
            <img class="rounded-t-lg w-full h-48 object-cover " src="../../Components/Images/no-image.jpg" alt="Image" />
        </div>

        <div class="p-5">
            <Preis :preis="listing.preis" class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white" />
      <ListingAddress :listing="listing" class="mb-3 font-normal text-gray-700 dark:text-gray-400" />
        <ListingSpace :listing="listing" class="mb-3 font-normal text-gray-400 dark:text-gray-300" />
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
  </div>

    <div v-else class="flex justify-center ">
        <div>Keine Lieblingst Anzeige</div>
    </div>
    <Footer  class="fixed bottom-0 w-full"></Footer>
  </template>
  
  <script setup>
  import Footer from "../../Layouts/Footer.vue";
  import { Link, usePage, router } from "@inertiajs/vue3";
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