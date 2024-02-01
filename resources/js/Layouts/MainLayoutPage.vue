<template>
    <div class="container">
        <Link href="/list">Listings</Link>
        <Link href="/list/create">New Listing</Link>
        <div v-if="flashSuccess" class="success">
          {{ flashSuccess }}
        </div>
    </div>
    <slot>
        Default
    </slot>
</template>

<script setup>
import {Link, usePage} from '@inertiajs/vue3';
// page.props.value.flash.success
const page = usePage()
const flashSuccess = computed(
  () => page.props.value.flash.success
)
</script>

<style scoped>
/* Add styling to the 'a' tag within the Link component */
Link a {
  padding: 10px;
  text-decoration: none;
  color: #333; /* Adjust the color as needed */
}

/* Add styling for the container if necessary */
.container {
  display: flex;
  justify-content: space-around;
  align-items: center;
  background-color: #f0f0f0;
  padding: 10px;
}
.success{
  background-color: greenyellow;
  color: white;
}
</style>
