
import {createRouter, createWebHistory} from 'vue-router';
import {useAuthStore} from "@/stores/AuthStore";

export const routes = [
    {
        path: "/",
        component: () => import("./pages/Home.vue"),
    },
    
    {
        path: "/login",
        component: () => import("./pages/Login.vue"),
    },

    {
        path: "/dashboard",
        component: () => import("./pages/Dashboard.vue"),
        meta: { requiresAuth: true },
    },
/*     {
        path: "/dashboard",
        component: () => import("./pages/Dashboard.vue"),
        meta: { requiresAuth: true },
    }, */
    {
        path: "/register",
        component: () => import("./pages/Register.vue"),
    }
];


const router = createRouter({
    history: createWebHistory(),
    routes
});

router.beforeEach((to, from, next) => {
    const isAuthenticated = !!localStorage.getItem('tocken');

    if(!to.meta.public && !isAuthenticated) {
        next({name: 'Login'});
    } else {
        next();
    }
});

router.beforeEach(useAuthStore); 

export default router;
