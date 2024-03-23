<template>
    <div>
      <span class="font-bold">{{ listing.zimmer }}</span> Zimmer <span class="text-gray-400">| </span>  
      <span class="font-bold">{{ listing.badezimmer }}</span> Badezimmer <span
        class="text-gray-400"
      >| </span>
      <span class="font-bold">{{ listing.wohnflaeche }}</span> m²
    </div>
  </template>
  
  <script setup>
  defineProps({
    listing: Object,
  })
  </script>