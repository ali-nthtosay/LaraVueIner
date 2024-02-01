<template>
    <MainLayoutPage>
        <div>
            <h1>Index</h1>
        </div>
        <div>
            The Message is {{ message }}
        </div>
    </MainLayoutPage>

</template>

<script setup>
import MainLayoutPage from '../../Layouts/MainLayoutPage.vue';
defineProps({
    message: String
})
</script>