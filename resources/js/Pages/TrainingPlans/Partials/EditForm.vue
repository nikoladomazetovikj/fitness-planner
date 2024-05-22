<script setup>
import {router, useForm} from "@inertiajs/vue3";
import { defineProps } from 'vue';

const props = defineProps({ categories: Array, trainingPlan: Object });

const form = useForm({
    name: props.trainingPlan.name,
    description: props.trainingPlan.description,
    categories_ids: props.trainingPlan.categories.map(category => category.id)
});

function submit() {
    router.put(route('training-plans.update', props.trainingPlan.id), form);
}

</script>

<template>
    <form @submit.prevent="submit">
        <v-container>
            <h1 class="text-h4 mb-4">Add New Training Plan</h1>
            <v-row>
                <v-col cols="12" md="12">
                    <v-text-field
                        v-model="form.name"
                        label="Name"
                        :error-messages="form.errors.name"
                    ></v-text-field>
                </v-col>
                <v-col cols="12" md="12">
                    <v-textarea clearable label="Description" v-model="form.description"
                                :error-messages="form.errors.description"></v-textarea>
                </v-col>
                <v-col cols="12" md="12">
                    <v-select
                        v-model="form.categories_ids"
                        :items="categories"
                        item-title="name"
                        item-value="id"
                        label="Category"
                        multiple
                        :error-messages="form.errors.categories_ids"
                        dense
                    ></v-select>
                </v-col>
                <v-col cols="12" class="d-flex justify-center">
                    <v-btn type="submit" color="primary" large  :disabled="form.processing" >Edit Training
                        Plan</v-btn>
                </v-col>
            </v-row>
        </v-container>
    </form>
</template>

<style scoped>

</style>
