import { computed, ref } from "vue";
import type { User, Credentials, NewUserCredentials } from "./types";
import {http} from "../http";
import router from "../router/router";

const user = ref<User | undefined>();

export const isLoggedIn = computed(() => {
    return user.value !== undefined;
});
export const getUser = computed(() => {
    return user.value;
})

export const unsetUser = () => {
    user.value = undefined;
}

export const login = async (credentials: Credentials) => {
    const { data } = await http.post('/api/login', credentials);
    user.value = data.data;
    router.push('/hidden'); // TODO Redirect to dashboard (#18)
}

export const register = async (credentials: NewUserCredentials) => {
    const { data } = await http.post('/api/register', credentials);
    user.value = data.data;
    router.push('/hidden'); // TODO Redirect to dashboard (#18)
}

export const me = async() => {
    const {data} = await http.get('/api/me');
    user.value = data.data;
    if (router.currentRoute.value.redirectedFrom) router.push(router.currentRoute.value.redirectedFrom);
}

export const logout = async () => {
    await http.get('/api/logout');
    unsetUser();
    router.push('/login');
    // TODO Redirect to wherever the landing page for logged out users should be (#18)
}