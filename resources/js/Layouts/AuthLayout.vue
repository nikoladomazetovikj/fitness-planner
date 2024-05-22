<script setup>
import { ref } from 'vue'
import {router, useForm} from "@inertiajs/vue3";

const drawer = ref(null)

const menuItems = [
    { title: 'Home', icon: 'mdi-home', route: route('home') },
    { title: 'Training Plans', icon: 'mdi-dumbbell', route: route('training-plans.index') },
    { title: 'Nutrition', icon: 'mdi-food', route: '/nutrition' },
    { title: 'Progress', icon: 'mdi-chart-line', route: '/progress' },
];

const navigate = (route) => {
    router.get(route)
};

const form = useForm({});

const logout = () => {
    router.post(route('logout'), form);
}

</script>

<script>
export default {
    data: () => ({ drawer: null }),
}
</script>



<template>
    <v-app>
        <v-navigation-drawer v-model="drawer" app>
            <v-list dense>
                <!-- Fitness Planner Title -->
                <v-list-item>
                    <v-list-item-title class="title">Fitness Planner</v-list-item-title>
                </v-list-item>

                <!-- Divider -->
                <v-divider></v-divider>

                <!-- Menu Items -->
                <v-list-item v-for="(item, index) in menuItems" :key="index" @click="navigate(item.route)">
                    <v-list-item-icon>
                        <v-icon>{{ item.icon }}</v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-title>{{ item.title }}</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>

                <v-divider></v-divider>
                <v-list-item @click="logout">
                    <v-list-item-icon>
                        <v-icon>mdi-logout</v-icon>
                    </v-list-item-icon>
                    <v-list-item-content>
                        <v-list-item-title>Logout</v-list-item-title>
                    </v-list-item-content>
                </v-list-item>
            </v-list>
        </v-navigation-drawer>

        <v-app-bar>
            <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>

            <v-app-bar-title>Fitness Planner</v-app-bar-title>
        </v-app-bar>

        <v-main>
           <slot />
        </v-main>
    </v-app>
</template>

