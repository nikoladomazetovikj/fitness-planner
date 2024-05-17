<script setup>

import AuthLayout from "../../../Layouts/AuthLayout.vue";

defineProps({ trainingPlans: Object });
</script>

<template>
    <AuthLayout>
        <v-container class="d-flex justify-center align-center" fluid>
            <v-row class="d-flex justify-center" no-gutters>
                <v-col cols="12" sm="8" class="d-flex justify-center">
                    <v-sheet class="ma-4 pa-4" >

                    </v-sheet>
                </v-col>
            </v-row>
        </v-container>
    </AuthLayout>
</template>

<style scoped>
</style>
