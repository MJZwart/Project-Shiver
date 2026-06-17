import { computed, ref } from "vue";
import type { User, Credentials, NewUserCredentials } from "./types";
import axios from "axios";
import router from "../router/router";

const user = ref<User | undefined>();

export const isLoggedIn = computed(() => {
    return user.value !== undefined;
});

export const login = async (credentials: Credentials) => {
    const { data } = await axios.post('/api/login', credentials);
    user.value = data.data;
    router.push('/hidden');
}

export const register = async (credentials: NewUserCredentials) => {
    const { data } = await axios.post('/api/register', credentials);
    user.value = data.data;
    router.push('/hidden');
}