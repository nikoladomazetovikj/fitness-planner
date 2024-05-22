<script setup>
import AuthLayout from "../../Layouts/AuthLayout.vue";
import EditForm from "./Partials/EditForm.vue";
import {Head} from "@inertiajs/vue3";

defineProps({ categories: Array, trainingPlan: Object });
</script>

<template>
    <Head :title="trainingPlan.name"/>
    <AuthLayout>
        <v-container class="d-flex justify-center align-center" fluid>
            <v-row class="d-flex justify-center" no-gutters>
                <v-col cols="12" sm="8" class="d-flex justify-center">
                    <v-sheet class="ma-4 pa-4" >
                        <EditForm :categories="categories" :trainingPlan="trainingPlan" />
                    </v-sheet>
                </v-col>
            </v-row>
        </v-container>
    </AuthLayout>
</template>

<style scoped>
.v-container {
    min-height: 100vh;
}
</style>
