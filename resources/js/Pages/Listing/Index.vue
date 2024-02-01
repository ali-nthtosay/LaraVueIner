<template>
    <div v-for="item in listings" :key="item.id" class="grid grid-cols-3 gap-4" >
        <div>
      <Link :href="`/list/${item.id}`" >
        <span>
            city: {{ item.city }} and the price : {{ item.price }}
        </span>
      </Link>
      <div class="btn">
        <button>
          <Link :href="`/list/${item.id}/edit`">Edit</Link>
        </button>
        <button>
          <Link :href='`/list/${item.id}`' method="DELETE">Delete</Link>
        </button>
      </div>

    </div>

    </div>

 
</template>

<script setup>
// import ListingAddress from '../../Components/ListingAddress.vue';
import { Link } from '@inertiajs/vue3'
    defineProps({
        listings: Array
    })
</script>

<style scoped>
button{
  padding: 2px;
  margin: 5px;
  background-color: bisque;
  border-radius: 5px;

}
</style>