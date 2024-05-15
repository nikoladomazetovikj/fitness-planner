<script setup>
import GuestLayout from "../../Layouts/GuestLayout.vue";
import { Head, useForm } from '@inertiajs/vue3';


const form = useForm({
    email: null,
    password: null,
});

</script>

<template>
    <Head title="Login"/>
    <GuestLayout>
        <v-form @submit.prevent="form.post('/login')">
            <v-container>
                <h1>Login</h1>
                <v-row>

                    <v-col cols="12" >
                        <v-text-field
                            v-model="form.email"
                            label="E-mail"
                            :error-messages="form.errors.email"
                            required
                        ></v-text-field>
                    </v-col>

                    <v-col cols="12" >
                        <v-text-field
                            v-model="form.password"
                            label="Password"
                            type="password"
                            :error-messages="form.errors.password"
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
                            Login
                        </v-btn>
                    </v-col>
                </v-row>
            </v-container>
        </v-form>
    </GuestLayout>
</template>

<style scoped>
</style>
