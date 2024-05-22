
<script setup>
import {router, Head} from "@inertiajs/vue3";

const login = () => {
    router.get(route('login'))
};
</script>

<template>
    <Head title="FitnessPlanner"/>
    <div>
        <!-- Hero Section -->
        <v-row align="center" justify="center" class="hero">
            <v-col cols="12" class="text-center">
                <h1 class="display-2 mb-4">Welcome to Fitness Planner</h1>
                <h2 class="subtitle-1 mb-6">Plan your workouts, track your progress, and achieve your fitness goals</h2>
                <v-btn color="primary" large @click="login">Get Started</v-btn>
            </v-col>
        </v-row>

        <!-- Features Section -->
        <v-row align="center" justify="center" class="features">
            <v-col cols="12" class="text-center">
                <h2 class="display-3 mb-6">Key Features</h2>
            </v-col>
            <v-col cols="12" md="4">
                <v-card class="pa-6 elevation-10">
                    <v-icon size="64" color="primary">mdi-calendar-check</v-icon>
                    <h3 class="subtitle-1 mt-4">Custom Workout Plans</h3>
                    <p>Create personalized workout plans tailored to your fitness goals and schedule.</p>
                </v-card>
            </v-col>
            <v-col cols="12" md="4">
                <v-card class="pa-6 elevation-10">
                    <v-icon size="64" color="primary">mdi-chart-line</v-icon>
                    <h3 class="subtitle-1 mt-4">Track Progress</h3>
                    <p>Monitor your progress with detailed statistics and analytics.</p>
                </v-card>
            </v-col>
            <v-col cols="12" md="4">
                <v-card class="pa-6 elevation-10">
                    <v-icon size="64" color="primary">mdi-account-multiple-check</v-icon>
                    <h3 class="subtitle-1 mt-4">Community Support</h3>
                    <p>Connect with like-minded individuals and receive support from our fitness community.</p>
                </v-card>
            </v-col>
        </v-row>

        <!-- Testimonials Section -->
        <v-row align="center" justify="center" class="testimonials">
            <v-col cols="12" class="text-center">
                <h2 class="display-3 mb-6 text-black">What Our Users Say</h2>
            </v-col>
            <v-col cols="12" md="4">
                <v-card class="pa-6 elevation-10">
                    <h3 class="subtitle-1 mt-4">John Doe</h3>
                    <p>"Fitness Planner helped me stay motivated and on track with my fitness goals. Highly recommended!"</p>
                </v-card>
            </v-col>
            <v-col cols="12" md="4">
                <v-card class="pa-6 elevation-10">
                    <h3 class="subtitle-1 mt-4">Jane Smith</h3>
                    <p>"I love the personalized workout plans. It's like having a personal trainer in my pocket!"</p>
                </v-card>
            </v-col>
            <v-col cols="12" md="4">
                <v-card class="pa-6 elevation-10">
                    <h3 class="subtitle-1 mt-4">Michael Johnson</h3>
                    <p>"The community support is fantastic. It's great to connect with others who share similar fitness goals."</p>
                </v-card>
            </v-col>
        </v-row>

        <v-row align="center" justify="center" class="user-benefits">
            <v-col cols="12" class="text-center">
                <h2 class="display-3 mb-6">Why Fitness Planner?</h2>
            </v-col>

            <!-- Member Benefits -->
            <v-col cols="12" md="6">
                <v-card class="pa-6 elevation-10">
                    <h3 class="subtitle-1 mt-4">For Members:</h3>
                    <v-list dense>
                        <v-list-item>
                            <v-icon color="primary">mdi-check-circle</v-icon>
                            <span class="ml-4">Subscribe to training plans tailored to your fitness goals.</span>
                        </v-list-item>
                        <v-list-item>
                            <v-icon color="primary">mdi-check-circle</v-icon>
                            <span class="ml-4">Track your progress with detailed analytics and statistics.</span>
                        </v-list-item>
                        <v-list-item>
                            <v-icon color="primary">mdi-check-circle</v-icon>
                            <span class="ml-4">Find nearby gyms and fitness centers.</span>
                        </v-list-item>
                    </v-list>
                </v-card>
            </v-col>

            <!-- Coach Benefits -->
            <v-col cols="12" md="6">
                <v-card class="pa-6 elevation-10">
                    <h3 class="subtitle-1 mt-4">For Coaches:</h3>
                    <v-list dense>
                        <v-list-item>
                            <v-icon color="primary">mdi-check-circle</v-icon>
                            <span class="ml-4">Create and manage custom training plans for your clients.</span>
                        </v-list-item>
                        <v-list-item>
                            <v-icon color="primary">mdi-check-circle</v-icon>
                            <span class="ml-4">Track your clients' progress and adjust plans accordingly.</span>
                        </v-list-item>
                        <v-list-item>
                            <v-icon color="primary">mdi-check-circle</v-icon>
                            <span class="ml-4">Gain exposure and attract new clients through the platform.</span>
                        </v-list-item>
                    </v-list>
                </v-card>
            </v-col>
        </v-row>
    </div>
</template>


<style scoped>
.hero {
    height: 100vh;
    background-image: url('https://t3.ftcdn.net/jpg/04/29/35/62/360_F_429356296_CVQ5LkC6Pl55kUNLqLisVKgTw9vjyif1.jpg');
    background-size: cover;
    color: white;
    padding: 50px 0;
}

.features {
    padding: 50px 0;
}

.features .v-card {
    text-align: center;
}

.testimonials {
    background-color: #f5f5f5;
    padding: 50px 0;
}

.testimonials .v-card {
    margin: 20px;
    padding: 30px;
}


.user-benefits {
    padding: 50px 0;
}

.span {
    padding-left: 8px;
}
</style>
