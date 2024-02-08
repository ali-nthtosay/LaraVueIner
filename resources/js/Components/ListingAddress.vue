<template>
    <div>
        <span>
            city: {{ listing.city }}, {{ listing.street }} , price : {{ listing.price }}
        </span>
    </div>
</template>

<script setup>
defineProps({
    listing: Object
})
</script>