<template>
  <span>{{ formattedPrice }}</span>
</template>

<script setup>
import {computed} from 'vue'
const props = defineProps({
  preis: [Number, String],
})
const formattedPrice = computed(
  () => Number(props.preis).toLocaleString('de-DE', {
    style: 'currency',
    currency: 'EUR',
    maximumFractionDigits: 0,
  }),
)
</script>