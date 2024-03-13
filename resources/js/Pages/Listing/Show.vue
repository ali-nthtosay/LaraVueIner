<template>

    <MainLayoutPage></MainLayoutPage>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4 mx-4 ">
    <Box class="md:col-span-7 flex items-center ">
            <div v-if="listing.images.length" class="grid grid-cols-2 gap-1">
                <img
                    v-for="image in listing.images"
                    :key="image.id"
                    :src="image.src"
                    class="w-32 h-32 object-cover "
                    alt="Listing Image"
                />
            </div>
            <div v-else class="w-full text-center font-medium text-gray-500">No images</div>
        </Box>
    <div class="md:col-span-5 flex flex-col gap-4">
      <Box>

        <Price :price="listing.price" class="text-2xl font-bold" />
        <ListingSpace :listing="listing" class="text-lg" />
        <ListingAddress :listing="listing" class="text-gray-500" />
      </Box>

      <Box>
        <div>Weitere Informationen</div>
      </Box>


    </div>
    
    </div>
    
    
</template>

<script setup>
import Icon from "../../Components/UI/Icon.vue";

import ListingAddress from '../../Components/ListingAddress.vue'
import MainLayoutPage from '../../Layouts/MainLayoutPage.vue'
import ListingSpace from '../../Components/ListingSpace.vue'
import Price from '../../Components/Price.vue';
import Box from  '../../Components/UI/Box.vue'
import { ref , computed} from "vue";
import {  router , usePage} from "@inertiajs/vue3";
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

    defineProps({
        listing: Object
    })
    
</script>