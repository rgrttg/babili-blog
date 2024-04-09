<template>
    <!-- Navigation bar -->
    <nav>
    <!-- Links for different routes. They are conditionally rendered based on the 'isLoggedIn' state. -->
    <router-link to="/" v-if="requiresAuth">post List</router-link> |
    <router-link to="/add-post" v-if="isLoggedIn">Add post</router-link> |
    <router-link to="/login" v-if="!authUser">Login</router-link> |
    <router-link to="/register" v-if="!isLoggedIn">Register</router-link> |
    <!-- Logout button that calls 'logout' action when clicked -->
    <a href="#" @click="logout" v-if="isLoggedIn">Logout</a>
    </nav>
</template>
    
    
 <script>
    import AuthService from '../services/AuthService.js';
    import {useAuthStore} from "../stores/AuthStore.js";

    const store = useAuthStore();

export default {
    computed: {
        isAuthenticated() {
            return this.$store.state.auth.isAuthenticated; // Example: Get authentication state from Vuex store
        }
    },
    methods: {
        logout() {
            // Implement logout functionality
        }
    }
}

</script> 

<style scoped>
nav {
    text-align: center;
}
</style>