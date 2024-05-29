<script setup>
import {Head, useForm} from "@inertiajs/vue3";
import AuthLayout from "../../Layouts/AuthLayout.vue";
import  {computed} from "vue";

const form = useForm({
    file: null,
});

const props = defineProps({data: Array, errors: Object});

const headers =  [
    { title: 'Name', align: 'center', key: 'name' },
    { title: 'Surname', align: 'center', key: 'surname' },
    { title: 'Email', align: 'center', key: 'email' },
    { title: 'Date of birth', align: 'center', key: 'dob' },
    { title: 'Country', align: 'center', key: 'country' },
    { title: 'City', align: 'center', key: 'city' },
]


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
    form.post(route('upload-members.store'));
}

function insert() {
    form.post(route('upload-members.insert'))
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
                                    <v-data-table-virtual
                                        :headers="headers"
                                        :items="tableData"
                                        height="400"
                                        item-value="name"
                                        hover
                                    >
                                        <template v-for="header in headers" v-slot:[`item.${header.key}`]="{ item }">
                                            <div>
                                                <v-btn :class="{ 'text-red': item.errors && item.errors[header.key] }">
                                                    {{ item[header.key] }}
                                                    <v-tooltip
                                                        v-if="item.errors && item.errors[header.key]"
                                                        activator="parent"
                                                        location="top"
                                                    >{{ item.errors[header.key][0] }}
                                                    </v-tooltip>
                                                </v-btn>
                                            </div>
                                        </template>
                                    </v-data-table-virtual>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-btn type="submit" @click="insert">
                                    Insert Users
                                </v-btn>
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
.tooltip-content {
    background-color: white;
    color: red;
    padding: 4px 8px;
    border-radius: 4px;
}
</style>
