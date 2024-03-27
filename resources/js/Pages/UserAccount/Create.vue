<template>
    <nav class="bg-white border-gray-200 dark:bg-gray-900 mb-5">
        <div
            class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4"
        >
            <a
                href="/realtor/listing"
                class="flex items-center space-x-3 rtl:space-x-reverse"
            >
                <img
                    src="https://flowbite.com/docs/images/logo.svg"
                    class="h-8"
                    alt="Logo"
                />
                <span
                    class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"
                ></span>
            </a>
            <button
                data-collapse-toggle="navbar-default"
                type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default"
                aria-expanded="false"
            >
                <span class="sr-only">Open main menu</span>
                <svg
                    class="w-5 h-5"
                    aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 17 14"
                >
                    <path
                        stroke="currentColor"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15"
                    />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700"
                >
                    <!-- <li>
          <Link href="/realtor/listing" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Dashboard</Link>
        </li> -->

                    <li>
                        <Link
                            href="/listing"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                        >
                            Liste
                        </Link>
                    </li>
                    <li>
                        <Link
                            href="/login"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent"
                        >
                            Anmelden
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <form class="max-w-md mx-auto" @submit.prevent="register">
        <div>
            <div class="relative z-0 w-full mb-5 group">
                <input
                    v-model="form.name"
                    type="name"
                    name="floating_name"
                    id="floating_name"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" "
                    required
                />
                <label
                    for="floating_name"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                    >Name</label
                >
            </div>
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
                <p
                    v-if="isEmailErrorVisible"
                    class="mt-2 text-sm text-red-600 dark:text-red-500"
                >
                    <span class="font-medium">Oops!</span>Die E-Mail-Adresse ist
                    ungültig.
                </p>
            </div>
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
                    >Passwort</label
                >
                <p
                    v-if="isPasswordErrorVisible"
                    class="mt-2 text-sm text-red-600 dark:text-red-500"
                >
                    <span class="font-medium">Oops!</span>Das Passwort muss
                    einen Kleinbuchstaben, einen Großbuchstaben, ein
                    Sonderzeichen und eine Zahl enthalten.
                </p>
            </div>
            <div class="relative z-0 w-full mb-5 group">
                <input
                    v-model="form.password_confirmation"
                    type="password"
                    name="repeat_password"
                    id="floating_repeat_password"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" "
                    required
                />
                <label
                    for="floating_repeat_password"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6"
                    >Passwort wiederholen</label
                >
            </div>

            <div class="flex items-start mb-5">
                <div class="flex items-center h-5">
                    <input
                        id="terms"
                        type="checkbox"
                        value=""
                        class="w-4 h-4 border border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:bg-gray-700 dark:border-gray-600 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800"
                        required
                    />
                </div>
                <label
                    for="terms"
                    class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300"
                    >Ich stimme
                    <a
                        href="#"
                        class="text-blue-600 hover:underline dark:text-blue-500"
                        >den Begriffe & Bedingungen.</a
                    ></label
                >
            </div>
        </div>
        <div>
            <div class="text-center">
                <button
                    type="submit"
                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                >
                    Registrieren
                </button>
                <p
                    id="helper-text-explanation"
                    class="mt-2 text-sm text-gray-500 dark:text-gray-400"
                >
                    Registriert ?
                    <a
                        href="/login"
                        class="font-medium text-blue-600 hover:underline dark:text-blue-500"
                        >Anmelden</a
                    >.
                </p>
            </div>
        </div>
    </form>
</template>

<script setup>
import { useForm, Link } from "@inertiajs/inertia-vue3";
import { router } from "@inertiajs/vue3";
import { ref } from "vue";
import { toast } from "vue3-toastify";
import { isPasswordValid, isValidEmail } from "../../utilities";
const form = useForm({
    name: null,
    email: null,
    password: null,
    password_confirmation: null,
});

let isPasswordErrorVisible = ref(false);
let isEmailErrorVisible = ref(false);

const register = () => {
    if (!isValidEmail(form.email)) {
        isEmailErrorVisible = true;
        toast.error("email not valid");
    } else if (!isPasswordValid(form.password)) {
        toast.error("Password is not acceptable");

        isPasswordErrorVisible = true;
        return;
    }

    router.post("/user-account/create", form, {
        onSuccess: (e) => {
            toast.success("User Created and Logged in Succesfull");
        },
        onError: (err) => {
            Object.values(err).map((er) => toast.error(er));
        },
    });
};
</script>
