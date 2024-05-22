<script setup>

import AuthLayout from "../../Layouts/AuthLayout.vue";

defineProps({trainingPlan: Object})

</script>

<template>
    <AuthLayout>
        <v-container fluid>
            <v-card class="mx-auto" max-width="600" elevation="3">
                <v-card-title class="headline">{{ trainingPlan.name }}</v-card-title>
                <v-divider></v-divider>
                <v-card-subtitle class="subtitle-1">{{ trainingPlan.description }}</v-card-subtitle>
                <v-divider></v-divider>
                <v-card-text>
                    <v-row>
                        <v-col cols="6">
                            <v-subheader class="subtitle-2">Coach:</v-subheader>
                            <div>{{ trainingPlan.coach.user.name }} {{ trainingPlan.coach.user.surname }}</div>
                            <v-subheader v-if="trainingPlan.coach.bio" class="subtitle-2">Bio:</v-subheader>
                            <div v-if="trainingPlan.coach.bio">{{ trainingPlan.coach.bio }}</div>
                        </v-col>
                        <v-col cols="6">
                            <v-subheader class="subtitle-2">Categories:</v-subheader>
                            <v-row>
                                <v-col v-for="category in trainingPlan.categories" :key="category.id" cols="auto">
                                    <v-chip
                                        outlined
                                        color="primary"
                                        class="ma-1"
                                    >
                                        {{ category.name }}
                                    </v-chip>
                                </v-col>
                            </v-row>
                        </v-col>
                    </v-row>
                </v-card-text>
            </v-card>
        </v-container>
    </AuthLayout>
</template>

<style scoped>
.v-container {
    max-height: 100vh;
}
</style>
