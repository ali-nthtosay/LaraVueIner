<template>
    <form class="form-container" @submit.prevent="update">
      <div class="form-group">
        <label>zimmer</label>
        <input v-model.number="form.zimmer" type="text" class="input-field" />
        <div v-if="form.errors.zimmer" class="input-error">
          {{ form.errors.zimmer }}
        </div>
      </div>
  
      <div class="form-group">
        <label>badezimmer</label>
        <input v-model.number="form.badezimmer" type="text" class="input-field" />
        <div v-if="form.errors.badezimmer" class="input-error">
          {{ form.errors.badezimmer }}
        </div>
      </div>
  
      <div class="form-group">
        <label>wohnflaeche</label>
        <input v-model.number="form.wohnflaeche" type="text" class="input-field" />
        <div v-if="form.errors.wohnflaeche" class="input-error">
          {{ form.errors.wohnflaeche }}
        </div>
      </div>
  
      <div class="form-group">
        <label>stadt</label>
        <input v-model="form.stadt" type="text" class="input-field" />
        <div v-if="form.errors.stadt" class="input-error">
          {{ form.errors.stadt }}
        </div>
      </div>
  
      <div class="form-group">
        <label>Post plz</label>
        <input v-model="form.plz" type="text" class="input-field" />
        <div v-if="form.errors.plz" class="input-error">
          {{ form.errors.plz }}
        </div>
      </div>
  
      <div class="form-group">
        <label>strasse</label>
        <input v-model="form.strasse" type="text" class="input-field" />
        <div v-if="form.errors.strasse" class="input-error">
          {{ form.errors.strasse }}
        </div>
      </div>
  

      <div class="form-group">
        <label>preis</label>
        <input v-model.number="form.preis" type="text" class="input-field" />
        <div v-if="form.errors.preis" class="input-error">
          {{ form.errors.preis }}
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
    zimmer: props.listing.zimmer ,
    badezimmer: props.listing.badezimmer,
    wohnflaeche: props.listing.wohnflaeche,
    stadt: props.listing.stadt,
    strasse: props.listing.stadt,
    plz: props.listing.plz,
    preis: props.listing.preis,
  })
  // const update = () => form.put(`/listing/${props.listing.id}`)
   const update = () => form.put(
  route('realtor.listing.update', { listing: props.listing.id }))
// const update = () => form.put(`/listing/${props.listing.id}`)

</script>
  