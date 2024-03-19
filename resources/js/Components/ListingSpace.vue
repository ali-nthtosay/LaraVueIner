<template>
    <div>
      <span class="font-bold">{{ listing.zimmer }}</span> bds <span class="text-gray-400">| </span>  
      <span class="font-bold">{{ listing.badezimmer }}</span> ba <span
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