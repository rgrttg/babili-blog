<script setup>
import { useAuthStore } from "../stores/AuthStore";
import LogoutButton from "@/components/LogoutButton.vue";
import BlogCardSelf from "../components/BlogCardSelf.vue";

const store = useAuthStore();
</script>

<template>
    <header>
        <LogoutButton />
    </header>
    <span>Dashboard</span>
    <h1>Hallo {{ store?.authUser?.name }}</h1>
    <BlogCardSelf></BlogCardSelf>
</template>
