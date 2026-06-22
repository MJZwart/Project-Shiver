<template>
    <form @submit.prevent="submitLogin" flex flex-col items-center>
        <h3>Login</h3>

        <label for="username">
            Username
        </label>
        <input id="username" v-model="credentials.username" />

        <label for="password">
            Password
        </label>
        <input id="password" type="password" v-model="credentials.password" />

        <button type="submit">Login</button>
    </form>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { login } from './auth';

const credentials = ref({
    username: "",
    password: "",
});

const submitLogin = () => {
    login(credentials.value);
}
</script>