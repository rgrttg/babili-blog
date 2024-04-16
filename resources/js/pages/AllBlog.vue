<script setup>
import BlogHeader from "../components/BlogHeader.vue";
import Card from "../components/Card.vue";
import SearchBar from "../components/SearchBar.vue";
import { ref, onMounted, defineProps } from "vue";
import axios from "axios";

const blogs = ref([]);

const load = async () => {
    try {
        const response = await axios.get("/api/blogs/all-latest");
        blogs.value = response.data;
        // console.log(response.data);
    } catch (error) {
        console.error("Error loading blogs:", error);
    }
};

function getSuchInput(suchInhalt) {
    console.log(suchInhalt);
}

onMounted(() => {
    load();
});
</script>
<template>
    <BlogHeader />
    <SearchBar v-on:suchen="getSuchInput" />

    <div>
        <Card :card-content="blogs" />
    </div>
</template>
<style scoped></style>
