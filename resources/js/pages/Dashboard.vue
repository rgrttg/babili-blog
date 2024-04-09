<script setup>
    import { useAuthStore } from '../stores/AuthStore';
    import LogoutButton from '@/components/LogoutButton.vue';
    import BlogCardSelf from '@/components/BlogCardSelf.vue';
    import Navbar from '@/components/Navbar.vue';
    import Creator from '@/components/Creator.vue';

    import { ref } from 'vue';
    const content = ref('');
    const getJson = (json) => {
    content.value = json;};

    const store = useAuthStore();

</script>


<template>
    <Navbar></Navbar>
    <creator @saved="getJson" />
    <LogoutButton></LogoutButton>

    <BlogCardSelf></BlogCardSelf>
</template>