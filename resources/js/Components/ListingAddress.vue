<template>
    <div>
        <span>
            stadt: {{ listing.stadt }}, {{ listing.strasse }} 
        </span>
    </div>
</template>

<script setup>
defineProps({
    listing: Object
})
</script>