<template>
    <form @submit.prevent="submitLogin" flex flex-col items-center>
        <h3>Login</h3>

        <FormError form-component="username">
            <div flex flex-col items-center>
                <label for="username">
                    Username
                </label>
                <input id="username" v-model="credentials.username" />
            </div>
        </FormError>

        <FormError form-component="password">
            <div flex flex-col items-center>
                <label for="password">
                    Password
                </label>
                <input id="password" type="password" v-model="credentials.password" />
            </div>
        </FormError>

        <button type="submit">Login</button>
    </form>
</template>

<script setup lang="ts">
import { ref } from 'vue';
import { login } from './auth';
import FormError from '../components/errors/FormError.vue';

const credentials = ref({
    username: "",
    password: "",
});

const submitLogin = () => {
    login(credentials.value);
}
</script>