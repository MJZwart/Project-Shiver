import Hidden from "../auth/Hidden.vue";
import Login from "../auth/Login.vue";
import Register from "../auth/Register.vue";
import Stonks from "../pages/Stonks.vue";

export const routes = [
    {
        path: '/',
        component: Stonks,
    },
    {
        path: '/register',
        component: Register,
    },
    {
        path: '/login',
        component: Login,
    },
    {
        path: '/hidden',
        component: Hidden,
        meta: {
            auth: true,
        }
    },  
];