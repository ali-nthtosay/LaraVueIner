<template>
    <MainLayoutPage></MainLayoutPage>
    <div class="flex flex-col-reverse md:grid md:grid-cols-12 gap-4 mx-4">
        <Box v-if="listing.images.length" class="md:col-span-7 flex items-center">
            <!-- <div v-if="listing.images.length" class="grid grid-cols-2 gap-1">
                <img
                    v-for="image in listing.images"
                    :key="image.id"
                    :src="image.src"
                    class="w-32 h-32 object-cover"
                    alt="Listing Image"
                />
            </div>
            <div v-else class="w-full text-center font-medium text-gray-500">
                No images
            </div> -->



            <div  id="gallery" class="relative w-full" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-56 overflow-hidden rounded-lg md:h-96">
         <!-- Item 1 -->
    <div class="hidden duration-700 ease-in-out" data-carousel-item  v-for="image in listing.images"
                    :key="image.id">
            <img 
                    :src="image.src" class="absolute block max-w-full h-auto -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="">
        </div>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 
    cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-dark/30 dark:bg-blue-800/30
         group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-black
          dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-black dark:text-gray-800 rtl:rotate-180"
             aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
            </svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-300 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-black dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>


        </Box>
        <Box v-else class="md:col-span-7 flex items-center" >
            <div  class="w-full text-center font-medium text-gray-500">
                Kein Foto vorhanden
</div>
        </Box>
        <div class="md:col-span-5 flex flex-col gap-4">
            <Box>
                <Preis :preis="listing.preis" class="text-2xl font-bold" />
                <ListingSpace :listing="listing" class="text-lg" />
                <ListingAddress :listing="listing" class="text-gray-500" />
            </Box>

            <Box>
                <div>Weitere Informationen</div>
                <div>
                    
                </div>
                <div>
                    {{ listing.count_view }}
                </div>
            </Box>
        </div>
    </div>
  <!-- Display comments if conditions are met -->
<div v-if="user.id == listing.by_user_id && listing.comments.length > 0" class="border border-gray-300 p-4 rounded-lg max-w-xl mx-auto mt-40">
    <h2 class="text-lg font-medium mb-2">Comments</h2>
    <div class="mb-4" v-for="comment in listing.comments" :key="comment.id">
        <div>
            <h5 class="block text-black font-medium mb-2 " for="comment">
                {{ listing.owner.name }} : {{ comment.comment }}
            </h5>
            <span> Kontakt: {{ comment.senderEmail }}</span>
        </div>
    </div>
</div>

<!-- Display a message if no comments are available -->
<div v-if="user.id == listing.by_user_id && listing.comments.length === 0" class="border border-gray-300 p-4 rounded-lg max-w-xl mx-auto mt-40">
    <h2 class="text-lg font-medium mb-2">Kommentar</h2>
    <div class="mb-4">
        <div>
            <h5 class="block text-black font-medium mb-2" for="comment">
                Es gibt keine Kommentar
            </h5>
        </div>
    </div>
</div>


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
                Comment sent successfully.
            </div>
        </div>
    </div>

    <div class="flex justify-center mt-10">
        <div
            v-if="erroMessage"
            id="toast-danger"
            class="flex items-center w-full max-w-xs p-4 mb-4 text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800"
            role="alert"
        >
            <div
                class="inline-flex items-center justify-center flex-shrink-0 w-8 h-8 text-red-500 bg-red-100 rounded-lg dark:bg-red-800 dark:text-red-200"
            >
                <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="currentColor"
                    viewBox="0 0 20 20"
                >
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 11.793a1 1 0 1 1-1.414 1.414L10 11.414l-2.293 2.293a1 1 0 0 1-1.414-1.414L8.586 10 6.293 7.707a1 1 0 0 1 1.414-1.414L10 8.586l2.293-2.293a1 1 0 0 1 1.414 1.414L11.414 10l2.293 2.293Z"
                    />
                </svg>
                <span class="sr-only">Error icon</span>
            </div>
            <div class="ms-3 text-sm font-normal">Comment could not send</div>
            <button
                type="button"
                class="ms-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex items-center justify-center h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700"
                data-dismiss-target="#toast-danger"
                aria-label="Close"
            >
                <span class="sr-only">Close</span>
                <svg
                    class="w-3 h-3"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 14 14"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
                    />
                </svg>
            </button>
        </div>
    </div>

    <div v-if="listing.by_user_id == user.id">
    </div>
    <div v-else>
        <div
            class="border border-gray-300 p-4 rounded-lg max-w-xl mx-auto mt-20"
        >
            <h2 class="text-lg font-medium mb-2">Kontaktieren Sie den Makler</h2>
            <!-- <form @submit.prevent="submitForm" @keyup.enter.prevent="submitForm"> -->
            <form @submit.prevent="submitForm">
                <div class="mb-4">
                    <label
                        class="block text-black-700 font-medium mb-2"
                        for="name"
                        >Name</label
                    >
                    <input
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-gray-500"
                        readonly
                        id="name"
                        type="text"
                        :value="listing.owner.name"
                    />
                </div>
                <div class="mb-4">
                    <label
                        class="block text-black-700 font-medium mb-2"
                        for="name"
                        >Telefonnummer(optional)</label
                    >
                    <input
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-gray-500"
                        id="name"
                        type="text"
                        v-model="form.senderTelephone"
                    />
                </div>
                <div class="mb-4">
                    <label
                        class="block text-black-700 font-medium mb-2"
                        for="comment"
                        >Kommentar</label
                    >
                    <textarea
                        rows="4"
                        v-model="form.comment"
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-gray-500"
                        id="comment"
                        placeholder="Shreiben Sie Ihre Anfrage ..."
                        required
                    ></textarea>
                    
                </div>
                
                <div class="flex items-start mb-6">
                    <div class="flex items-center h-5">
                        <input
                            id="remember"
                            type="checkbox"
                            value=""
                            v-model="agree"
                            class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800"
                            required
                        />
                    </div>
                    <label
                        for="remember"
                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                        >Ich akzeptiere 
                        <a
                            href="#"
                            class="text-blue-600 hover:underline dark:text-blue-500"
                            >
                            Geschäftsbedingungen</a
                        >.</label
                    >
                </div>
                <div class="flex justify-end">
                    <button
                        type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                    >
                        Post Comment
                    </button>
                </div>
            </form>
        </div>
    </div>
    <Footer  class="fixed bottom-0 w-full"></Footer>

</template>

<script setup>
import Chips from 'primevue/chips';

import Icon from "../../Components/UI/Icon.vue";
import GetComment from "../Comment/GetComment.vue";
import AddComment from "../Comment/AddComment.vue";
import ListingAddress from "../../Components/ListingAddress.vue";
import MainLayoutPage from "../../Layouts/MainLayoutPage.vue";
import ListingSpace from "../../Components/ListingSpace.vue";
import Preis from "../../Components/Preis.vue";
import Box from "../../Components/UI/Box.vue";
import Footer from "../../Layouts/Footer.vue";

import { ref, computed } from "vue";
import { router, usePage, useForm } from "@inertiajs/vue3";
import AddCommentVue from "../Comment/AddComment.vue";
const page = usePage();

const user = computed(() => page.props.auth.user);
import axios from "axios";
const sentMessage = ref(false);
const errorMessage = ref(false);
const agree = ref(false);
const props = defineProps({
    listing: Array,
});

const form = useForm({
    senderEmail: "",
    senderTelephone: "",
    comment: "",
    listing_id: null,
});

const submitForm = async () => {
    try {
        await axios.post("/comment/store/", {
            senderTelephone: form.senderTelephone,
            comment: form.comment,
            listing_id: props.listing.id,
        });
        agree.value = false;
        sentMessage.value = true; // Set sentMessage to true after successful submission
        setTimeout(() => {
            sentMessage.value = false; // Reset sentMessage to false after 3 seconds
        }, 3000);
        console.log(form);
        form.comment = "";
        (form.senderEmail = ""),
            (form.senderTelephone = ""),
            (form.listing_id = null);
    } catch (error) {
        console.error("Error submitting comment:", error);
        errorMessage.value = true; // Set sentMessage to true after successful submission
        setTimeout(() => {
            errorMessage.value = false; // Reset sentMessage to false after 3 seconds
        }, 3000);
    }
};
</script>

<style scoped>
.success-message {
    background-color: green;
    color: white;
    padding: 10px;
    border-radius: 5px;
    text-align: center;
    opacity: 0; /* Initially hidden */
    transition: opacity 1s ease-in-out; /* Transition effect */
}

/* Show the success message */
.success-message.show {
    opacity: 1;
}
</style>
