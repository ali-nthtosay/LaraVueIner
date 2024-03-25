<template>
    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 box overflow-x-hidden mx-5">
        <Link :href="`/listing/${listing.id}`">
            <div v-if="listing.images.length > 0" class="flex flex-column">
                <img class="rounded-t-lg w-full h-48 object-cover" :src="listing.images[0].src" alt="Image" />
            </div>
            <div v-else>
                <img class="rounded-t-lg w-full h-48 object-cover " src="../../Components/Images/no-image.jpg" alt="Image" />
            </div>
        </Link>
        <div class="p-5 flex justify-between items-center">
            <div>
                <Link :href="`/listing/${listing.id}`">
                    <Preis :preis="listing.preis" class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white" />
                </Link>
                <ListingAddress :listing="listing" class="mb-3 font-normal text-gray-700 dark:text-gray-400" />
                <ListingSpace :listing="listing" class="mb-3 font-normal text-gray-400 dark:text-gray-300" />
            </div>

        </div>
        <div class="flex items-center pl-4 pb-2">
                
                <div class="mr-auto ">
                    <div v-if="user.id !== listing.by_user_id" class="mr-2">
                        <div>
                            <Button @click="toggleLike(listing.id)">
                                <Icon :name="listing.likes_count ? 'heart-fill' : 'heart'"></Icon>
                            </Button>
                        </div>
                    </div>
                </div>

                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" 
  d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
            <div class="pr-3 pl-2">{{ listing.count_view }}</div>
            </div>
    </div>
</template>


<script setup>
import { BeakerIcon } from '@heroicons/vue/24/solid'


import { Link, usePage, router } from "@inertiajs/vue3";
const props = defineProps({ listing: Object});
import ListingAddress from "../../Components/ListingAddress.vue";
import ListingSpace from "../../Components/ListingSpace.vue";
import Preis from "../../Components/Preis.vue";
import Box from "../../Components/UI/Box.vue";
import Icon from "../../Components/UI/Icon.vue";
import { ref, computed } from "vue";


const page = usePage();
const user = computed(() => page.props.auth.user);
var liked = ref(false);
function toggleLike(id) {
    if (liked) {
        liked = !liked;
        router.post(`/listing/${id}/like`, {}, { preserveScroll: true });
    } else {
        liked = !liked;
        router.delete(`/listing/${id}/like`, {}, { preserveScroll: true });
    }
}
</script>

<style>
.box {
    transition: transform 0.3s ease; /* Add transition for smooth effect */
}
.box:hover {
    transform: scale(1.02); /* Scale up the image on hover */
}
</style>
