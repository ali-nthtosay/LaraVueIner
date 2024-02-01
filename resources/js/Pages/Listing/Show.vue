<template>
    <div>
        <ListingAddress :element="singleItem" />
    </div>
</template>

<script setup>
import ListingAddress from '../../Components/ListingAddress.vue';

    defineProps({
        singleItem: Object
    })
</script>