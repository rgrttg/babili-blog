


export const routes = [
    {
        path: "/",
        name:"home",
        component: () => import("./pages/Home.vue"),
        meta: { showLogo: false, allBlogs: true, getStarted: true},
    },
    
    {
        path: "/login",
        name:"login",
        component: () => import("./pages/Login.vue"),
        meta: { showLogo: true, allBlogs: false, getStarted: false, home},
    },

    {
        path: "/dashboard",
        name:"dashboard",
        component: () => import("./pages/Dashboard.vue"),
        meta: { requiresAuth: true, 
        showLogo: true, allBlogs:true , getStarted: false},
    
    },
    {
        path: "/register",
        name:"register",
        component: () => import("./pages/Register.vue"),
        meta: { showLogo: true, allBlogs:false, getStarted: false}
    },

    {
        path:"/create",
        name:"create",
        component: () => import("./pages/CreateBlog.vue"),
        meta: { showLogo: true, allBlogs:false, getStarted: false}
    },

    {
        path:"/single-blog",
        name:"singleBlog",
        component: () => import("./pages/SingleBlog.vue"),
        meta: { showLogo: true, allBlogs:false, getStarted: false},

    },

    {
        path: "/mtest",
        component: () => import("./pages/MatildaTest.vue"), // test page of matilda may no stay here
        meta:{ showLogo: true, allBlogs:true, getStarted:false},
    }
];





