<script setup>
import { useForm } from "@inertiajs/vue3";
import { defineProps } from 'vue';

defineProps({ categories: Array });

const form = useForm({
    name: null,
    description: null,
    categories_ids: null
});
</script>

<template>
    <form @submit.prevent="form.post('/training-plans')">
        <v-container>
            <h1>Add New Training Plan</h1>
            <v-row>
                <v-col cols="12" md="12">
                    <v-text-field
                        v-model="form.name"
                        label="Name"
                        required
                        :error-messages="form.errors.name"
                    ></v-text-field>
                </v-col>
                <v-col cols="12" md="12">
                    <v-text-field
                        v-model="form.description"
                        label="Description"
                        required
                        :error-messages="form.errors.description"
                    ></v-text-field>
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
                    ></v-select>
                </v-col>
                <v-col cols="12" class="d-flex justify-center">
                    <v-btn type="submit" color="primary">Create Training Plan</v-btn>
                </v-col>
            </v-row>
        </v-container>
    </form>
</template>

<style scoped>
</style>
