<template>
    <div>
        <span>
            city: {{ listing.city }}, {{ listing.street }} 
        </span>
    </div>
</template>

<script setup>
defineProps({
    listing: Object
})
</script>