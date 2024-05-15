<script setup>
import GuestLayout from "../../Layouts/GuestLayout.vue";
import { ref } from 'vue';
import { Head } from '@inertiajs/vue3'

const valid = ref(false);
const firstname = ref('');
const lastname = ref('');
const email = ref('');
const password = ref('');
const passwordConfirmation = ref('');
const dateOfBirth = ref('');
const country = ref('');
const city = ref('');

const nameRules = [
    v => !!v || 'Name is required',
    v => v.length <= 10 || 'Name must be less than 10 characters',
];

const emailRules = [
    v => !!v || 'E-mail is required',
    v => /.+@.+\..+/.test(v) || 'E-mail must be valid',
];

const passwordRules = [
    v => !!v || 'Password is required',
    v => v.length >= 6 || 'Password must be at least 6 characters',
];

const passwordMatchRule = [
    v => !!v || 'Password confirmation is required',
    v => v === password.value || 'Passwords must match',
];
</script>

<template>
    <Head title="Register"/>
    <GuestLayout>
        <v-form v-model="valid">
            <v-container>
                <h1>Register</h1>
                <v-row>
                    <v-col
                        cols="12"
                        md="6"
                    >
                        <v-text-field
                            v-model="firstname"
                            :rules="nameRules"
                            label="First name"
                            hide-details
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="12"
                        md="6"
                    >
                        <v-text-field
                            v-model="lastname"
                            :rules="nameRules"
                            label="Last name"
                            hide-details
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="12"
                        md="6"
                    >
                        <v-text-field
                            v-model="email"
                            :rules="emailRules"
                            label="E-mail"
                            hide-details
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="12"
                        md="6"
                    >
                        <v-text-field
                            v-model="password"
                            :rules="passwordRules"
                            label="Password"
                            type="password"
                            hide-details
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="12"
                        md="6"
                    >
                        <v-text-field
                            v-model="passwordConfirmation"
                            :rules="passwordMatchRule"
                            label="Confirm Password"
                            type="password"
                            hide-details
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="12"
                        md="6"
                    >
                        <v-text-field
                            v-model="dateOfBirth"
                            label="Date of Birth"
                            type="date"
                            hide-details
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="12"
                        md="6"
                    >
                        <v-text-field
                            v-model="country"
                            label="Country"
                            hide-details
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="12"
                        md="6"
                    >
                        <v-text-field
                            v-model="city"
                            label="City"
                            hide-details
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col
                        cols="12"

                    >
                        <v-btn
                            class="text-none mb-4 "
                            color="indigo-darken-3"
                            size="large"
                            variant="flat"
                            type="submit"
                            block
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
