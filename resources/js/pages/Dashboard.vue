<script setup>
    import { useAuthStore } from '../stores/AuthStore';
    import LogoutButton from '@/components/LogoutButton.vue';
    import BlogCardSelf from '@/components/BlogCardSelf.vue';
    import Navbar from '@/components/Navbar.vue';


    const store = useAuthStore();

</script>


<template>
    <Navbar></Navbar>
    
    <h1>Hi, you are on the Dashboard</h1>

    <LogoutButton></LogoutButton>

    <BlogCardSelf></BlogCardSelf>
</template>