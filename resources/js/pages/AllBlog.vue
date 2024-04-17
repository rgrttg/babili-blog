<script setup>
import BlogHeader from "../components/BlogHeader.vue";
import Card from "../components/Card.vue";
import SearchBar from "../components/SearchBar.vue";
import { ref, onMounted, defineProps } from "vue";
import axios from "axios";

const blogs = ref();

// /api/search?input=SuchText

const load = async (url) => {
    try {
        const response = await axios.get(`/api/search?input=${url}`);
        blogs.value = response.data;
        // console.log(`/api/search?input=${url}`);
    } catch (error) {
        console.error("Error loading blogs:", error);
    }
};

function getSuchInput(suchInhalt) {
    let url = suchInhalt;
    load(url);
}
</script>
<template>
    <BlogHeader />
    <SearchBar v-on:suchen="getSuchInput" />

    <div>
        <Card v-for="blog in blogs" :key="blog.id" :card-content="blog" />
    </div>
</template>
<style scoped></style>
