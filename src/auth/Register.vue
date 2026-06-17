<template>
    <div flex flex-col items-center>
        <h3>Register new account</h3>

        <label for="username">
            Username
        </label>
        <input id="username" v-model="credentials.username" />

        <label for="password">
            Password
        </label>
        <input id="password" type="password" v-model="credentials.password" />

        <label for="password-confirmation">
            Repeat password
        </label>
        <input id="password-confirmation" type="password" v-model="credentials.password_confirmation" />

        <button @click="submitRegister">Register</button>
    </div>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { register } from './auth';

const createNewCredentials = () => {
    return {
        username: "",
        password: "",
        password_confirmation: "",
    }
}

const credentials = ref(createNewCredentials());

const submitRegister = async () => {
    register(credentials.value);
}
</script>