<template>
  <div class="mx-auto">
    <nav class="bg-gray-300 border-gray-200 dark:bg-gray-900 mb-5">
      <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <a href="/dashboard/listing" class="flex items-center space-x-3 rtl:space-x-reverse">
          <img src="" class="h-5" alt="Logo" />
          <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">{{ user.name }}</span>
        </a>
        <button
          data-collapse-toggle="navbar-default"
          type="button"
          class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
          aria-controls="navbar-default"
          aria-expanded="false"
          @click="toggleNavbar"
        >
          <span class="sr-only">Open main menu</span>
          <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
          </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default" :class="{ 'hidden': !navbarOpen }">
          <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-300
           rounded-lg bg-gray-300 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-gray dark:bg-gray-800
            md:dark:bg-gray-900 dark:border-gray-700">
            
            <li>
              <Link href="/dashboard/listing" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 
              md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500
               dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Dashboard</Link>
            </li>
            <li>
              <Link href="/listing" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Liste</Link>
            </li>
            <li>
              <Link :href="`/listing/${user.id}/favorite`" 
              class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 
              md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white 
              md:dark:hover:bg-transparent">Merkblatt</Link>
            </li>
            <li>
              <Link href="/dashboard/listing/create" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Anzeige aufgeben</Link>
            </li>
            <li v-if="user">
              <button @click="logout" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 16">
    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h11m0 0-4-4m4 4-4 4m-5 3H3a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h3"/>
</svg></button>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <slot></slot>
  </div>
</template>

<script setup>
    import { useToast } from "vue-toastification";

import { Link, usePage,router } from "@inertiajs/vue3";
import { ref, computed, onBeforeUnmount } from "vue";
const toast = useToast();

const page = usePage();
const user = computed(() => page.props.auth.user);

const logout = () => {
  toast.success("Abmeldung war erfoglreich", {timeout: false});
  router.post(route('logout'));
  }
</script>

