<script setup>
import {onMounted, ref} from "vue";

defineProps({message: String})

const showAlert = ref(true);

onMounted(() => {
    setTimeout(() => {
        showAlert.value = false;
    }, 2000);
});
</script>

<template>
    <v-alert
        v-if="showAlert"
        :text="message"
        type="success"
        transition="fade-transition"
    ></v-alert>
</template>

<style scoped>

</style>
