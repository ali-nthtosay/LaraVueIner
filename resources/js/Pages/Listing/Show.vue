<template>

    <MainLayoutPage></MainLayoutPage>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4 mx-4">
    <Box class="md:col-span-7 flex items-center ">
      <div class="w-full text-center font-medium text-gray-500">No images</div>
    </Box>
    <div class="md:col-span-5 flex flex-col gap-4">
      <Box>

        <Price :price="singleItem.price" class="text-2xl font-bold" />
        <ListingSpace :listing="singleItem" class="text-lg" />
        <ListingAddress :element="singleItem" class="text-gray-500" />
      </Box>

      <Box>
        <div>Angebot</div>
      </Box>
    </div>
    </div>
    
</template>

<script setup>
import ListingAddress from '../../Components/ListingAddress.vue'
import MainLayoutPage from '../../Layouts/MainLayoutPage.vue'
import ListingSpace from '../../Components/ListingSpace.vue'
import Price from '../../Components/Price.vue';
import Box from  '../../Components/UI/Box.vue'


    defineProps({
        singleItem: Object
    })
    
</script>