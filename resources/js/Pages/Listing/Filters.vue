<template>
  <form @submit.prevent="filter">
      <div class="mb-8 mt-4 flex justify-center gap-2">
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
          v-model.number="filterForm.wohnflaecheVon"
            type="text" placeholder="wohnflaeche von"
            class="input-filter-l w-28"
          />
          <input
          v-model.number="filterForm.wohnflaecheBis"
            type="text" placeholder="wohnflaeche bis"
            class="input-filter-r w-28"
          />
        </div>
  
        <button type="submit" class="btn-normal" >Filter</button>
        <button type="reset" @click="clear" class="btn-normal">Zurücksetzen</button>
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
  wohnflaecheVon: props.filters.wohnflaecheVon ?? null,
  wohnflaecheBis: props.filters.wohnflaecheBis ?? null,
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
  filterForm.wohnflaecheVon = null
  filterForm.wohnflaecheBis = null
  filter()
}
</script>

