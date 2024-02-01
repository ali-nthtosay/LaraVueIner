<template>
    <div>
        <span>
            city: {{ element.city }} and the price : {{ element.price }}
        </span>
    </div>
</template>

<script setup>
defineProps({
    element: Object
})
</script>