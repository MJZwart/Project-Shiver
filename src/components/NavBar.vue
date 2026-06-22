<template>
    <div flex flex-row p-2.5 win-header class="winborder" w-full>
        <div>
            <router-link to="/">Project Shiver</router-link>
            <router-link v-if="isLoggedIn" to="/hidden">Auth test page</router-link>
        </div>

        <div ml-auto flex gap-2>
            <router-link v-if="!isLoggedIn" to="/login">Login</router-link>
            <router-link v-if="!isLoggedIn" to="/register">Register</router-link>
            <a v-if="isLoggedIn" @click="logout" cursor-pointer>Logout</a>
        </div>
    </div>
</template>

<script setup lang="ts">
import { isLoggedIn, logout } from '../auth/auth';
</script>

<!-- <style scoped>
.bar {
    box-shadow: inset -1px -1px #0a0a0a, inset 1px 1px #dfdfdf, inset -2px -2px gray, inset 2px 2px white;
    background: linear-gradient(90deg, navy, #1084d0);
}
</style> -->