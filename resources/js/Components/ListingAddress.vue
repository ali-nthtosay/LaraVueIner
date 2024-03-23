<template>
    <div>
        <span>
            
            Stadt: {{ listing.stadt }}, PLZ: {{ listing.plz }}
        </span>
    </div>
    <div>
        <span>
            Straße: {{ listing.strasse }}, Hausnummer : {{ listing.hausnummer }}
        </span>
    </div>
</template>

<script setup>
defineProps({
    listing: Object
})
</script>