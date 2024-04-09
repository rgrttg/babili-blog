


export const routes = [
    {
        path: "/",
        component: () => import("./pages/Home.vue"),
        meta: { showLogo: false, allBlogs: true},
    },
    
    {
        path: "/login",
        component: () => import("./pages/Auth/Login.vue"),
        meta: { showLogo: true, allBlogs: false},
    },

    {
        path: "/dashboard",
        component: () => import("./pages/Dashboard.vue"),
        meta: { requiresAuth: true, 
        showLogo: true, allBlogs:true },
    
    },
    {
        path: "/register",
        component: () => import("./pages/Auth/Register.vue"),
        meta: { showLogo: true, allBlogs:false},

    },

    {
        path: "/mtest",
        component: () => import("./pages/MatildaTest.vue"), // test page of matilda may no stay here
        meta:{ showLogo: true, allBlogs:true},
    }
];





