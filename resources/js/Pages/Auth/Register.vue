<script setup>
import GuestLayout from "../../Layouts/GuestLayout.vue";
import { Head, useForm } from '@inertiajs/vue3';

defineProps({ countries: Object, roles: Object });


const form = useForm({
    name: null,
    surname: null,
    email: null,
    password: null,
    password_confirmation: null,
    dob: null,
    country_id: null,
    city: null,
    role_id: null
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
                            required
                            :error-messages="form.errors.name"
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" md="6">
                        <v-text-field
                            v-model="form.surname"
                            label="Last name"
                            :error-messages="form.errors.surname"
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" md="6">
                        <v-text-field
                            v-model="form.email"
                            label="E-mail"
                            :error-messages="form.errors.email"
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" md="6">
                        <v-text-field
                            v-model="form.password"
                            label="Password"
                            type="password"
                            :error-messages="form.errors.password"
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" md="6">
                        <v-text-field
                            v-model="form.password_confirmation"
                            label="Confirm Password"
                            type="password"
                            :error-messages="form.errors.password_confirmation"
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" md="6">
                        <v-text-field
                            v-model="form.dob"
                            label="Date of Birth"
                            type="date"
                            :error-messages="form.errors.dob"
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" md="6">
                        <v-select
                            v-model="form.country_id"
                            :items="countries"
                            label="Country"
                            :error-messages="form.errors.country_id"
                            required
                            item-title="name"
                            item-value="id"
                        ></v-select>
                    </v-col>

                    <v-col cols="12" md="6">
                        <v-text-field
                            v-model="form.city"
                            label="City"
                            :error-messages="form.errors.city"
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" md="6">
                        <v-radio-group
                            v-model="form.role_id"

                            :error-messages="form.errors.role_id"
                            label="Role"
                        >
                            <v-radio
                                color="primary"
                                :label="roles[0].name"
                                :value="roles[0].id"
                            ></v-radio>
                            <v-radio
                                color="primary"
                                :label="roles[1].name"
                                :value="roles[1].id"
                            ></v-radio>

                        </v-radio-group>
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
