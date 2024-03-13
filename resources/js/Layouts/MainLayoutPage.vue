<template>
    <div>
        <!-- Header -->
        <div class="grid min-h-[140px] w-full place-items-center overflow-x-scroll rounded-lg lg:overflow-visible">
  <div class="-m-6 max-h-[768px] w-[calc(100%+48px)] overflow-scroll">
    <nav
      class="sticky top-0 z-10 block w-full max-w-full text-gray-700 bg-white border rounded-none shadow-md h-max border-black/80 bg-opacity-80 backdrop-blur-2xl backdrop-saturate-200 lg:px-8 lg:py-4">
      <div class="flex items-center justify-between text-blue-gray-900">
        <a href="#"
          class="mr-4 block cursor-pointer py-1.5 font-sans text-base font-medium leading-relaxed text-inherit antialiased">
          Gmb
        </a>
        <div class="flex items-center gap-4">
          <div class="hidden mr-4 lg:block">
            <ul class="flex flex-col gap-2 mt-2 mb-4 lg:mb-0 lg:mt-0 lg:flex-row lg:items-center lg:gap-6">
              <li class="block p-1 font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                <Link href="/listing" class="flex items-center">
                  Lists
                </Link>
              </li>
              <li class="block p-1 font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                <Link href="/realtor/listing/create" class="btn-primary">+ New Listing</Link>
              </li>
            </ul>
          </div>
          <div  class="flex items-center gap-x-1">
            <Link href="/realtor/listing"
              class="hidden px-4 py-2 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:inline-block"
              >
              {{ user.name }}</Link>
              <Link :href="`/listing/${user.id}/favorite`"
              
              class="hidden px-4 py-2 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:inline-block"
              > Favorite
              </Link>
            </div>
           <div v-if="user" class="flex items-center gap-x-1">
            <Link href="/logout" method="DELETE"
              class="hidden px-4 py-2 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:inline-block"
              >
             logout</Link>
            </div>

              <div v-else class="flex items-center gap-x-1">
            <Link href="/login"
              class="hidden px-4 py-2 font-sans text-xs font-bold text-center text-gray-900 uppercase align-middle transition-all rounded-lg select-none hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none lg:inline-block"
              >
              </Link>
            </div> 
          
        </div>
      </div>
    </nav>
  </div>
</div>
            <slot></slot>
    </div>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { computed } from "vue";
const page = usePage();

const user = computed(() => page.props.auth.user);
</script>
