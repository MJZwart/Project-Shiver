import { createRouter, createWebHistory } from "vue-router";
import {routes} from './routes';
import { isLoggedIn } from "../auth/auth";
import { emptyErrorBag } from "../http";

const router = createRouter({
    history: createWebHistory(),
    routes
});

router.beforeEach((to, from) => {
    emptyErrorBag();
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