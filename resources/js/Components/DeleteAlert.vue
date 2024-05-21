<script setup>
import { ref, watch, defineProps, defineEmits } from 'vue';

const props = defineProps({
    show: Boolean,
});

const emit = defineEmits(['close', 'confirm']);
const internalDialogVisible = ref(props.show);

watch(() => props.show, (newVal) => {
    internalDialogVisible.value = newVal;
});

const closeDialog = () => {
    emit('close');
};

const confirmDelete = () => {
    emit('confirm');
};
</script>

<template>
    <v-dialog v-model="internalDialogVisible" max-width="400" persistent>
        <v-card>
            <v-card-title class="text-h5">Are you sure you want to delete?</v-card-title>
            <v-card-text>This action cannot be undone.</v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="red"  @click="confirmDelete">Delete</v-btn>
                <v-btn  @click="closeDialog">Cancel</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>


<style scoped>

</style>
