import { createRouter, createWebHistory } from "vue-router";
import {routes} from './routes';
import { isLoggedIn } from "../auth/auth";

const router = createRouter({
    history: createWebHistory(), // Choices??
    routes
});

router.beforeEach((to, from, next) => {
    if (to.meta.auth && !isLoggedIn.value) {
        return next({path: '/login'});
    }
// TODO Console says this is deprecated, to just return the value, just not sure what this value is.
    return next();
});

export default router;