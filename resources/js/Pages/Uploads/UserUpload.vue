<script setup>

import {Head, useForm} from "@inertiajs/vue3";
import AuthLayout from "../../Layouts/AuthLayout.vue";
import {ref} from "vue";

const form = useForm({
    file: null,
})

const importErrors = ref([]);

function submit() {
    form.post(route('upload-members.store'), {
        onError: (errors) => {
            if (errors.import_errors) {
                importErrors.value = errors.import_errors;
            }
        },
    });
}

</script>

<template>
    <Head title="UploadUsers"/>
    <AuthLayout>
        <v-container class="d-flex justify-center align-center" fluid>
            <v-row class="d-flex justify-center" no-gutters>
                <v-col cols="12" sm="8" class="d-flex justify-center">
                    <v-sheet class="ma-4 pa-4" >
                        <form @submit.prevent="submit">
                            <v-container>
                                <h1 class="text-h4 mb-4">Upload Members</h1>
                                <v-row>
                                    <v-col cols="12" md="12">
                                        <v-file-input v-model="form.file" clearable label="Upload"></v-file-input>
                                    </v-col>
                                    <v-col cols="12" class="d-flex justify-center">
                                        <v-btn type="submit" color="primary" large  :disabled="form.processing" >Upload
                                            Members</v-btn>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </form>
                        <v-container>
                            <v-row v-if="importErrors.length">
                                <v-col cols="12">
                                    <v-alert type="error" dismissible>
                                        <div v-for="(error, index) in importErrors" :key="index">
                                            <strong>Row {{ error.row }}:</strong>
                                            <ul>
                                                <li v-for="(message, i) in error.errors" :key="i">{{ message }}</li>
                                            </ul>
                                            <hr />
                                        </div>
                                    </v-alert>
                                </v-col>
                            </v-row>
                        </v-container>
                    </v-sheet>
                </v-col>
            </v-row>
        </v-container>
    </AuthLayout>
</template>

<style scoped>
.v-container {
    max-height: 100vh;
}
</style>
