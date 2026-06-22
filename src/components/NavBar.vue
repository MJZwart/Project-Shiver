<template>
    <div flex flex-row p-2.5 bg-white bg-opacity-05 w-full>
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