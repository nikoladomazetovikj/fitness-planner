<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import AuthLayout from "../../Layouts/AuthLayout.vue";
import {ref, computed} from "vue";

const form = useForm({
    file: null,
});

const props = defineProps({data: Array, errors: Object});

const importErrors = ref([]);

const tableData = computed(() => {
    return props.data?.map((item, index) => {
        return {
            ...item,
            errors: props.errors[index] || {},
            rowIndex: index,
        };
    });
});

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
                    <v-sheet class="ma-4 pa-4">
                        <form @submit.prevent="submit">
                            <v-container>
                                <h1 class="text-h4 mb-4">Upload Members</h1>
                                <v-row>
                                    <v-col cols="12" md="12">
                                        <v-file-input v-model="form.file" clearable label="Upload"></v-file-input>
                                    </v-col>
                                    <v-col cols="12" class="d-flex justify-center">
                                        <v-btn type="submit" color="primary" large :disabled="form.processing">Upload
                                            Members
                                        </v-btn>
                                    </v-col>
                                </v-row>
                            </v-container>
                        </form>
                        <v-container>
                            <v-row>
                                <v-col cols="12">
                                    <v-data-table :items="tableData" class="elevation-1">
                                        <template #item.rowIndex="{ item }">
                                            <v-tooltip bottom>
                                                <template #activator="{ on, attrs }">
                                                    <span v-bind="attrs" v-on="on">{{ item.rowIndex + 1 }}</span>
                                                </template>
                                                <span v-if="Object.keys(item.errors).length">
                          <strong v-for="(fieldErrors, field) in item.errors" :key="field">
                            {{ field }}:
                            <ul>
                              <li v-for="(message, index) in fieldErrors" :key="index">{{ message }}</li>
                            </ul>
                          </strong>
                        </span>
                                            </v-tooltip>
                                        </template>
                                        <template #item.name="{ item }">
                                            {{ item.name }}
                                        </template>
                                        <template #item.surname="{ item }">
                                            {{ item.surname }}
                                        </template>
                                        <template #item.email="{ item }">
                                            {{ item.email }}
                                        </template>
                                        <template #item.dob="{ item }">
                                            {{ item.dob }}
                                        </template>
                                        <template #item.country="{ item }">
                                            {{ item.country }}
                                        </template>
                                        <template #item.city="{ item }">
                                            {{ item.city }}
                                        </template>
                                    </v-data-table>
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
