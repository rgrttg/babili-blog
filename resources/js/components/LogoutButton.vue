<script setup>
  import { useAuthStore } from '@/stores/AuthStore';
  import {useRouter} from 'vue-router';

  const router = useRouter();
  const store = useAuthStore();

  const logout = async () => {
      await store.logout().then(() => {
          router.push('/');
      });
  }
</script>

<template>
    <p
      type="button"
      @click="logout"
    >Ausloggen
</p>
  </template>
  
