<template>
    <div flex flex-row p-2.5 bg-white bg-opacity-05 w-full>
        <div>
            <router-link to="/">Project Shiver</router-link>
            <router-link to="/hidden">Auth test page</router-link>
        </div>

        <div ml-auto flex gap-2>
            <router-link to="/login">Login</router-link>
            <router-link to="/register">Register</router-link>
            <a @click="logout" cursor-pointer>Logout</a>
        </div>
    </div>
</template>

<script setup lang="ts">
import { logout } from '../auth/auth';

// TODO Use isLoggedIn to hide pages invisible to logged out users
</script>