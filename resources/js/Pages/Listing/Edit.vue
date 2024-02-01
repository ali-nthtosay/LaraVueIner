<template>
    <form class="form-container" @submit.prevent="update">
      <div class="form-group">
        <label>Beds</label>
        <input v-model.number="form.beds" type="text" class="input-field" />
        <div v-if="form.errors.beds">
          {{ form.errors.beds }}
        </div>
      </div>
  
      <div class="form-group">
        <label>Baths</label>
        <input v-model.number="form.baths" type="text" class="input-field" />
        <div v-if="form.errors.baths">
          {{ form.errors.baths }}
        </div>
      </div>
  
      <div class="form-group">
        <label>Area</label>
        <input v-model.number="form.area" type="text" class="input-field" />
        <div v-if="form.errors.area">
          {{ form.errors.area }}
        </div>
      </div>
  
      <div class="form-group">
        <label>City</label>
        <input v-model="form.city" type="text" class="input-field" />
        <div v-if="form.errors.city">
          {{ form.errors.city }}
        </div>
      </div>
  
      <div class="form-group">
        <label>Post Code</label>
        <input v-model="form.code" type="text" class="input-field" />
        <div v-if="form.errors.code">
          {{ form.errors.code }}
        </div>
      </div>
  
      <div class="form-group">
        <label>Street</label>
        <input v-model="form.street" type="text" class="input-field" />
        <div v-if="form.errors.street">
          {{ form.errors.street }}
        </div>
      </div>
  
      <!-- <div class="form-group">
        <label>Street Nr</label>
        <input v-model.number="form.street_nr" type="text" class="input-field" />
      </div> -->
  
      <div class="form-group">
        <label>Price</label>
        <input v-model.number="form.price" type="text" class="input-field" />
        <div v-if="form.errors.price">
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
  const update = () => form.put(`/list/${props.listing.id}`)
  </script>
  
  <style scoped>
  .form-container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 5px;
    text-align: center;
  }
  
  .form-group {
    margin-bottom: 15px;
  }
  
  .input-field {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  
  .submit-button {
    background-color: #4caf50;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    text-align: center;
    width: 100%;
  }
  .submit-button:hover {
  background-color: #45a049;
}

  </style>
  