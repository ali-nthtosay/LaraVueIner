<template>
    <div>
        <span>
            city: {{ element.city }}, {{ element.street }} , price : {{ element.price }}
        </span>
    </div>
</template>

<script setup>
defineProps({
    element: Object
})
</script>