<template>
    <form>
    <div class="mb-4 mt-4 flex flex-wrap gap-4">
        <div class="flex flex-nowrap items-center gap-2">
          <input
            id="deleted"
            v-model="filterForm.deleted"
            type="checkbox" class="h-4 w-4 rounded border-gray-300 text-indigo-600 focus:ring-indigo-500"
          />
          <label for="deleted">Deleted</label>
        </div>
        <div>
        <select v-model="filterForm.by" class="input-filter-l w-24">
          <option value="created_at">Datum</option>
          <option value="preis">Preis</option>
        </select>
        <select v-model="filterForm.order" class="input-filter-r w-32">
          <option
            v-for="option in sortOptions" 
            :key="option.value" :value="option.value"
          >
            {{ option.label }}
          </option>
        </select>
      </div>
      </div>
    </form>
  </template>
  
  <script setup>
  import { reactive, watch, computed } from 'vue'
  import { Inertia } from '@inertiajs/inertia'
  import {router} from '@inertiajs/vue3'
  import {debounce} from 'lodash'
  const sortLabels = {
  created_at: [
    {
      label: 'Zuletzt',
      value: 'desc',
    },
    {
      label: 'Älteste',
      value: 'asc',
    },
  ], 
  preis: [
    {
      label: 'Teureste',
      value: 'desc',
    },
    {
      label: 'Billigste',
      value: 'asc',
    },
  ],
}
const sortOptions = computed(() => sortLabels[filterForm.by])
const props = defineProps({
  filters: Object,
})
  const filterForm = reactive({
    deleted: props.filters.deleted ?? false,
    by: props.filters.by ?? 'created_at',
    order: props.filters.order ?? 'desc',
  })
  // reactive / ref / computed
  watch(
    filterForm, debounce(() => router.get(
      '/dashboard/listing',
      filterForm,
      { preserveState: true, preserveScroll: true },
  ), 1000),
  )
  </script>