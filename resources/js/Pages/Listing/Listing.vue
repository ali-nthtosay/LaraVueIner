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
            <div class="flex items-center">
                <div>{{ listing.count_view }}</div>
                <div class="ml-auto">
                    <div v-if="user.id !== listing.by_user_id" class="mr-2">
                        <div>
                            <Button @click="toggleLike(listing.id)">
                                <Icon :name="listing.likes_count ? 'heart-fill' : 'heart'"></Icon>
                            </Button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script setup>
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
