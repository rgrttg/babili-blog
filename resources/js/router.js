


export const routes = [
    {
        path: "/",
        component: () => import("./pages/Home.vue"),
        meta: { showLogo: false, allBlogs: true},
    },
    
    {
        path: "/login",
        component: () => import("./pages/Login.vue"),
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
        component: () => import("./pages/Register.vue"),
        meta: { showLogo: true, allBlogs:false}
    },

    {
        path:"/create",
        component: () => import("./pages/CreateBlog.vue"),
    },

    {
        path:"/single-blog",
        component: () => import("./pages/SingleBlog.vue"),
        meta: { showLogo: true, allBlogs:false},

    },

    {
        path: "/mtest",
        component: () => import("./pages/MatildaTest.vue"), // test page of matilda may no stay here
        meta:{ showLogo: true, allBlogs:true},
    }
];





