<template>


<main-layout-page></main-layout-page>

<div class="flex justify-center mt-10">
        <div
            v-if="sentMessage"
            id="toast-simple"
            class="flex w-full max-w-xs p-4 space-x-4 rtl:space-x-reverse text-gray-500 bg-white divide-x rtl:divide-x-reverse divide-gray-200 rounded-lg shadow dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800"
            role="alert"
        >
            <svg
                class="w-5 h-5 text-blue-600 dark:text-blue-500 rotate-45"
                aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 18 20"
            >
                <path
                    stroke="currentColor"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="m9 17 8 2L9 1 1 19l8-2Zm0 0V9"
                />
            </svg>
            <div class="ps-4 text-sm font-normal">
                Anzeige wurde erfolgreich erstellt
            </div>
        </div>
    </div>
<form class="max-w-md mx-auto mt-7" @submit.prevent="create">

  <div class="grid md:grid-cols-2 md:gap-6">
    <div class="relative z-0 w-full mb-5 group">
        <input v-model.number="form.zimmer" type="number"  name="floating_zimmer" id="floating_zimmer" class="block py-2.5 px-0 w-full text-sm text-gray-900
         bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_zimmer" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]
         peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
         peer-focus:scale-75 peer-focus:-translate-y-6">Zimmer</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input v-model.number="form.badezimmer"  type="nummer" name="floating_badezimmer" id="floating_badezimmer" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_badezimmer" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
        transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 
        peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Badezimmer</label>
    </div>

    <div class="relative z-0 w-full mb-5 group">
        <input v-model.number="form.wohnflaeche" type="number"  name="floating_wohnflaeche" id="floating_wohnflaeche" class="block py-2.5 px-0 w-full text-sm text-gray-900
         bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_wohnflaeche" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]
         peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
         peer-focus:scale-75 peer-focus:-translate-y-6">Wohnfläche</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input v-model.number="form.preis"  type="number"  name="floating_preis" id="floating_preis" class="block py-2.5 px-0 w-full text-sm text-gray-900
         bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_preis" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]
         peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
         peer-focus:scale-75 peer-focus:-translate-y-6">Preis</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input  v-model.number="form.stadt"  type="nummer" name="floating_stadt" id="floating_stadt" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_stadt" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
        transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 
        peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Stadt</label>
    </div>


    <div class="relative z-0 w-full mb-5 group">
        <input  v-model.number="form.plz"  type="nummer" name="floating_plz" id="floating_plz" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_plz" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
        transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 
        peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">PLZ</label>
    </div>

    <div class="relative z-0 w-full mb-5 group">
        <input v-model.number="form.strasse"  type="text"  name="floating_strasse" id="floating_strasse" class="block py-2.5 px-0 w-full text-sm text-gray-900
         bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_strasse" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0]
         peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 
         peer-focus:scale-75 peer-focus:-translate-y-6">Straße</label>
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input  v-model.number="form.hausnummer"  type="nummer" name="floating_plz" id="floating_plz" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
        <label for="floating_plz" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 
        transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 
        peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Hausnummer</label>
    </div>

    <div class="relative z-0 w-full mb-5 group">
  <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Wählen Sie Wohnungstype aus</label>
  <select  v-model.number="form.wohnungstype"  
class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5
 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

    <option>Wohnung</option>
    <option>Haus</option>
 
  </select>

    </div>


  </div>
  
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center
   dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Anzeige Erstellen</button>
</form>


<Footer  class="fixed bottom-0 w-full"></Footer>


</template>

<script setup>
import Footer from "../../Layouts/Footer.vue";
import axios from "axios";
import { ref } from "vue";
const sentMessage = ref(false);
const errorMessage = ref(false);

import MainLayoutPage from "../../Layouts/MainLayoutPage.vue";
import { useForm } from "@inertiajs/vue3";
const form = useForm({
    zimmer: null,
    badezimmer: null,
    wohnflaeche: null,
    stadt: null,  
    strasse: null,
    plz: null,
    street_nr: null,
    preis: null,
    hausnummer: null,
    wohnungstype: null,
});
const create = () => form.post(route('dashboard.listing.store'));
</script>
