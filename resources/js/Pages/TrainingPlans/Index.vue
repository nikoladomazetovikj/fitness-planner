<script setup>
import AuthLayout from "../../Layouts/AuthLayout.vue";
import {ref, computed, watch} from 'vue';
import {defineProps} from 'vue';
import {router, Link } from '@inertiajs/vue3';
import DeleteAlert from "../../Components/DeleteAlert.vue";

const props = defineProps({
    trainingPlans: {
        type: Object,
        required: true
    }
});

const page = ref(props.trainingPlans.current_page);
const items = ref(props.trainingPlans.data);
const dialogVisible = ref(false);
const itemToDelete = ref(null);

let totalPages =  props.trainingPlans.last_page;

watch(page, (newPage) => {
    router.get(route('training-plans.index'), {page: newPage}, {preserveState: false});
});

const handleEdit = (id) => {
    router.get(route('training-plans.edit', id));
};

const handleDelete = (id) => {
    itemToDelete.value = id;
    dialogVisible.value = true;
};

const confirmDelete = () => {
    router.delete(route('training-plans.destroy', itemToDelete.value), {preserveState: false});
    dialogVisible.value = false;
};

const closeDialog = () => {
    dialogVisible.value = false;
};

</script>

<template>
    <AuthLayout>
        <v-container class="d-flex justify-center align-center" fluid>
            <v-row class="d-flex justify-center" no-gutters>
                <v-col cols="12" sm="8">
                    <v-data-iterator :items="items" :items-per-page="10" :page.sync="page">
                        <template v-slot:default="{ items }">
                            <template v-for="(item, i) in items" :key="i">
                                <v-card class="mb-3">
                                    <v-card-title class="d-flex justify-space-between">
                                        <Link :href="route('training-plans.show', item.raw.id)">{{
                                                item.raw.name }}</Link>
                                        <span>Posted: {{ new Date(item.raw.created_at).toLocaleDateString() }}</span>
                                    </v-card-title>
                                    <v-card-subtitle>Coach: {{ item.raw.coach.user.name }} {{
                                            item.raw.coach.user.surname
                                        }}
                                    </v-card-subtitle>
                                    <v-card-text>
                                        <v-row>
                                            <v-col v-for="(category, index) in item.raw.categories" :key="index"
                                                   cols="auto">
                                                <v-chip>{{ category.name }}</v-chip>
                                            </v-col>
                                        </v-row>
                                    </v-card-text>
                                    <v-card-actions class="d-flex justify-end">
                                        <v-btn color="primary" @click="handleEdit(item.raw.id)">Edit</v-btn>
                                        <v-btn color="red" @click="handleDelete(item.raw.id)">Delete</v-btn>
                                    </v-card-actions>
                                </v-card>
                            </template>
                            <v-pagination
                                v-model="page"
                                :length="totalPages"
                                :total-visible="10"
                            ></v-pagination>
                        </template>
                    </v-data-iterator>
                </v-col>
            </v-row>
            <DeleteAlert :show="dialogVisible" @close="closeDialog" @confirm="confirmDelete" />
        </v-container>
    </AuthLayout>
</template>

<style scoped>
</style>
