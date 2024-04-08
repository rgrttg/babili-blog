<script setup>
import BlogHeroheader from '../components/BlogHeroheader.vue';
</script>

<template>
    <BlogHeroheader/>
    <div>
        <h1>Startseite</h1>
        <router-link to="/login">Link zur Login Seite</router-link>
        <creator @saved="getJson" />
    </div>
</template>

<script setup>
import { ref } from 'vue';
const content = ref('');
const getJson = (json) => {
  content.value = json;};
</script>