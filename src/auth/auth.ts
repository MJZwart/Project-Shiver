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
    router.push('/hidden'); // TODO Redirect to dashboard
}

export const register = async (credentials: NewUserCredentials) => {
    const { data } = await axios.post('/api/register', credentials);
    user.value = data.data;
    router.push('/hidden'); // TODO Redirect to dashboard
}

export const me = async() => {
    const {data} = await axios.get('/api/me');
    user.value = data.data;
    // TODO This does not redirect to where you were going, instead sends you to the login screen due to router shenanigans
    // Find a way to redirect to where you were trying to go when this happens
}

export const logout = async () => {
    await axios.get('/api/logout');
    user.value = undefined;
    // Redirect to wherever the landing page for logged out users should be
}