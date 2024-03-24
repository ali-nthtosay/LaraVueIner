<template>
    <NavBar :isListingPage="true"></NavBar>
    <form class="max-w-md mx-auto my-auto" @submit.prevent="login">
      <!-- Email input field -->
      <div class="relative z-0 w-full mb-5 group">
        <input
          v-model="form.email"
          type="email"
          name="floating_email"
          id="floating_email"
          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
          placeholder=" "
          required
        />
        <label
          for="floating_email"
          class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
          >Email</label
        >
      </div>
      <!-- Password input field -->
      <div class="relative z-0 w-full mb-5 group">
        <input
          v-model="form.password"
          type="password"
          name="floating_password"
          id="floating_password"
          class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
          placeholder=" "
          required
        />
        <label
          for="floating_password"
          class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
          >Kennwort</label
        >
      </div>
  
      <!-- Error message -->
      <p v-if="errorMessage" class="text-sm text-red-500 mb-2">{{ errorMessage }}</p>
  
      <div class="pt-6">
        <div class="text-center">
          <!-- Submit button -->
          <button
            type="submit"
            class="mx-auto text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
          >
            Anmelden
          </button>
          <!-- Registration link -->
          <p
            id="helper-text-explanation"
            class="mt-2 text-sm text-gray-500 dark:text-gray-400"
          >
            Nicht Registriert ?
            <a
              href="/user-account/create"
              class="font-medium text-blue-600 hover:underline dark:text-blue-500"
              >Registrieren</a
            >.
          </p>
        </div>
      </div>
    </form>
  </template>
  
  <script setup>
  import NavBar from "../../Layouts/NavBar.vue";
  import { useForm, Link } from "@inertiajs/vue3";
  import { ref } from "vue";
  const isListingPage = ref(true);
  const form = useForm({
    email: null,
    password: null,
  });
  // Error message variable
  const errorMessage = ref('');
  
  // Login function
  const login = async () => {
    try {
      // Send login request
      const response = await form.post(route("login.store"));
      // If login is successful, redirect to dashboard or desired page
      // You can customize the redirect location according to your application's logic
      if (response.ok) {
        // Redirect to dashboard or desired page
        // Example: Inertia.visit('/dashboard');
      }
    } catch (error) {
      // If login fails, display error message and clear form fields
      errorMessage.value = "Die E-Mail-Adresse oder das Kennwort ist ungültig.";
      // Clear form fields
      form.email = '';
      form.password = '';
    }
  };
  </script>
  