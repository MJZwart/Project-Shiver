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

        <button @click="createNewAccount">Register</button>
    </div>
</template>

<script setup lang="ts">
import axios from 'axios';
import { ref } from 'vue';

const createNewCredentials = () => {
    return {
        username: "",
        password: "",
        password_confirmation: "",
    }
}

const credentials = ref(createNewCredentials());

const createNewAccount = async () => {
    const { data } = await axios.post('/api/register', credentials.value);
    console.log(data);
}
</script>