<template>
    <form class="form-container" @submit.prevent="update">
      <div class="form-group">
        <label>Beds</label>
        <input v-model.number="form.beds" type="text" class="input-field" />
        <div v-if="form.errors.beds" class="input-error">
          {{ form.errors.beds }}
        </div>
      </div>
  
      <div class="form-group">
        <label>Baths</label>
        <input v-model.number="form.baths" type="text" class="input-field" />
        <div v-if="form.errors.baths" class="input-error">
          {{ form.errors.baths }}
        </div>
      </div>
  
      <div class="form-group">
        <label>Area</label>
        <input v-model.number="form.area" type="text" class="input-field" />
        <div v-if="form.errors.area" class="input-error">
          {{ form.errors.area }}
        </div>
      </div>
  
      <div class="form-group">
        <label>City</label>
        <input v-model="form.city" type="text" class="input-field" />
        <div v-if="form.errors.city" class="input-error">
          {{ form.errors.city }}
        </div>
      </div>
  
      <div class="form-group">
        <label>Post Code</label>
        <input v-model="form.code" type="text" class="input-field" />
        <div v-if="form.errors.code" class="input-error">
          {{ form.errors.code }}
        </div>
      </div>
  
      <div class="form-group">
        <label>Street</label>
        <input v-model="form.street" type="text" class="input-field" />
        <div v-if="form.errors.street" class="input-error">
          {{ form.errors.street }}
        </div>
      </div>
  

      <div class="form-group">
        <label>Price</label>
        <input v-model.number="form.price" type="text" class="input-field" />
        <div v-if="form.errors.price" class="input-error">
          {{ form.errors.price }}
        </div>
      </div>
  
      <div class="form-group">
        <button type="submit" class="submit-button">Create</button>
      </div>
    </form>
  </template>
  
  <script setup>
  import { useForm } from '@inertiajs/vue3'; 
  const props= defineProps({
    listing: Object
  })
  const form = useForm({
    beds: props.listing.beds ,
    baths: props.listing.baths,
    area: props.listing.area,
    city: props.listing.city,
    street: props.listing.city,
    code: props.listing.code,
    price: props.listing.price,
  })
  const update = () => form.put(`/listing/${props.listing.id}`)
  </script>
  