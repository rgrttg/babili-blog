


export const routes = [
    {
        path: "/",
        component: () => import("./pages/Home.vue"),
    },
    
    {
        path: "/blogs/detail/:id",
        name: 'blogdetail',
        component: () => import("./pages/SingleBlog.vue"),
        // meta: { requiresAuth: true },
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
    {
        path: "/register",
        component: () => import("./pages/Register.vue"),
    },

    {
        path:"/create",
        component: () => import("./pages/CreateBlog.vue"),
    },

    {
        path:"/edit-profile",
        component: () => import("./pages/EditProfile.vue"),
    },
    
    {
        path:"/alle-blogs",
        component: () => import("./pages/AllBlog.vue"),
    },


    {
        path:"/edit-blog",
        component: () => import("./pages/EditBlog.vue"),
    }
];





