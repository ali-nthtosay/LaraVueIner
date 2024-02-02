<template>
  <div>
    <!-- Header -->
    <header class="border-b border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 w-full">
      <div class="container mx-auto">
        <nav class="p-4 flex items-center justify-between">
          <div class="text-lg font-medium">
            <Link href="/list">Listings</Link>
          </div>
          <div>
            <div v-if="user" class="flex">
              {{ user.name }}
            </div>
            <Link href="/list/create" class="btn-primary">+ New Listing</Link>
          </div>
        </nav>
      </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto p-2">
      <slot></slot>
    </main>
  </div>
</template>

<script setup>
import { Link, usePage } from '@inertiajs/vue3';
import { computed } from 'vue'
const page = usePage();

const user = computed(() => page.props.auth.user );

</script>

