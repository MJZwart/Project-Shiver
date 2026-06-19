import { createRouter, createWebHistory } from "vue-router";
import {routes} from './routes';
import { isLoggedIn } from "../auth/auth";

const router = createRouter({
    history: createWebHistory(),
    routes
});

router.beforeEach((to, from) => {
    if (to.meta.auth && !isLoggedIn.value) {
        return {
            path: '/login',
            query: {
                redirectedFrom: to.fullPath,
            },
        }
    }
    return true;
});

export default router;