<script setup>
    import { useAuthStore } from '../stores/AuthStore';
    import BlogCard from '@/components/BlogCard.vue';
    import Navbar from '@/components/Navbar.vue';

    const store = useAuthStore();
</script>

<template>
    <Navbar></Navbar>
    <div>
        <h1>Startseite</h1>
        <router-link to="/login">Link zur Login Seite</router-link>
    </div>

    <div>
        <router-link to="/register">Link zur register Seite</router-link>
    </div>

    <p>After the Navbar and other cards comes the card:</p>

    <BlogCard></BlogCard>
</template>