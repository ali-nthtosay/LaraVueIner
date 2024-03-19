<template>
  <form @submit.prevent="filter">
      <div class="mb-8 mt-4 flex flex-wrap gap-2">
        <div class="flex flex-nowrap items-center">
          <input
          v-model.number="filterForm.preisVon"
            type="text" placeholder="preis von"
            class="input-filter-l w-28"
          />
          <input
          v-model.number="filterForm.preisBis"
            type="text" placeholder="preis to" 
            class="input-filter-r w-28"
          />
        </div>
  
        <div class="flex flex-nowrap items-center">
            <select v-model="filterForm.zimmer" class="input-filter-l w-28">
            <option :value="null">zimmer</option>
            <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
            <option>6+</option>
          </select>
          <select v-model="filterForm.badezimmer" class="input-filter-r w-28">
            <option :value="null">badezimmer</option>
            <option v-for="n in 5" :key="n" :value="n">{{ n }}</option>
            <option>6+</option>
          </select>
        </div>
  
        <div class="flex flex-nowrap items-center">
          <input
          v-model.number="filterForm.flaecheVon"
            type="text" placeholder="wohnflaeche from"
            class="input-filter-l w-28"
          />
          <input
          v-model.number="filterForm.flaecheBis"
            type="text" placeholder="wohnflaeche to"
            class="input-filter-r w-28"
          />
        </div>
  
        <button type="submit" class="btn-normal" >Filter</button>
        <button type="reset" @click="clear">Clear</button>
      </div>
    </form>
  </template>


<script setup>
import { useForm } from '@inertiajs/vue3'


const props = defineProps({
  filters: Object,
})
const filterForm = useForm({
  preisVon: props.filters.preisVon ?? null,
  preisBis: props.filters.preisBis ?? null,
  zimmer: props.filters.zimmer ?? null,
  badezimmer: props.filters.badezimmer ?? null,
  flaecheVon: props.filters.flaecheVon ?? null,
  flaecheBis: props.filters.flaecheBis ?? null,
})
const filter = () => {
  filterForm.get('/listing',{
    preserveScroll: true,
    preserveScroll: true
  })
}
const clear = () => {
  filterForm.preisVon = null
  filterForm.preisBis = null
  filterForm.zimmer = null
  filterForm.badezimmer = null
  filterForm.flaecheVon = null
  filterForm.flaecheBis = null
  filter()
}
</script>

