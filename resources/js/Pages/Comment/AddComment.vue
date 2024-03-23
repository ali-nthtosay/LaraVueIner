<template>
<div class="border border-gray-300 p-4 rounded-lg max-w-xl mx-auto mt-40">
    <h2 class="text-lg font-medium mb-2">Leave a comment</h2>
    <form>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2" for="name">
                Name
            </label>
            <input
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-gray-500"
                id="name" type="text" placeholder="Enter your name">
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 font-medium mb-2" for="comment">
                Comment
            </label>
            <textarea rows="4"
                class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:border-gray-500"
                id="comment" placeholder="Enter your comment"></textarea>
        </div>
        <div class="flex justify-end">
            <button
                class="bg-blue-500 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="button">Post Comment</button>
        </div>
    </form>
    
</div>
</template>

<script>
import {useForm} from '@inertiajs/inertia-vue3'
export default {
    setup(){
        const form = useForm({
            title : '',
            content: ''
        })
        return {form}
    }
}
</script>