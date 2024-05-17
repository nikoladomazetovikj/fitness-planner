<script setup>
</script>

<template>
    <v-container
        class="d-flex justify-center align-center"
        fluid
    >
        <v-row
            class="d-flex justify-center"
            no-gutters
        >
            <v-col
                cols="12"
                sm="4"
                class="d-flex justify-center"
            >
                <v-sheet class="ma-2 pa-2">
                    <slot/>
                </v-sheet>
            </v-col>
        </v-row>
    </v-container>
</template>

<style scoped>
.v-container {
    min-height: 100vh;
}
</style>
