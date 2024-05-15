<script setup>
import GuestLayout from "../../Layouts/GuestLayout.vue";
import { Head, useForm } from '@inertiajs/vue3';

defineProps({ countries: Object });


const form = useForm({
    name: null,
    surname: null,
    email: null,
    password: null,
    password_confirmation: null,
    dob: null,
    country_id: null,
    city: null
});

</script>

<template>
    <Head title="Register"/>
    <GuestLayout>
        <v-form @submit.prevent="form.post('/register')">
            <v-container>
                <h1>Register</h1>
                <v-row>
                    <v-col cols="12" md="6">
                        <v-text-field
                            v-model="form.name"
                            label="First name"
                            hide-details
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" md="6">
                        <v-text-field
                            v-model="form.surname"
                            label="Last name"
                            hide-details
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" md="6">
                        <v-text-field
                            v-model="form.email"
                            label="E-mail"
                            hide-details
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" md="6">
                        <v-text-field
                            v-model="form.password"
                            label="Password"
                            type="password"
                            hide-details
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" md="6">
                        <v-text-field
                            v-model="form.password_confirmation"
                            label="Confirm Password"
                            type="password"
                            hide-details
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" md="6">
                        <v-text-field
                            v-model="form.dob"
                            label="Date of Birth"
                            type="date"
                            hide-details
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" md="6">
                        <v-select
                            v-model="form.country_id"
                            :items="countries"
                            label="Country"
                            hide-details
                            required
                            item-title="name"
                            item-value="id"
                        ></v-select>
                    </v-col>

                    <v-col cols="12" md="6">
                        <v-text-field
                            v-model="form.city"
                            label="City"
                            hide-details
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12">
                        <v-btn
                            class="text-none mb-4"
                            color="indigo-darken-3"
                            size="large"
                            variant="flat"
                            type="submit"
                            block
                            :disabled="form.processing"
                        >
                            Register
                        </v-btn>
                    </v-col>
                </v-row>
            </v-container>
        </v-form>
    </GuestLayout>
</template>

<style scoped>
</style>
