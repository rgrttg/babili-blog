<script setup>
    import { useAuthStore } from '../stores/AuthStore';
    import LogoutButton from '@/components/LogoutButton.vue';

    const store = useAuthStore();

</script>


<template>
<h1>Hi, you are on the Dashboard</h1>
</template>