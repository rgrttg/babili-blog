<script setup>
import BlogHeader from "../components/BlogHeader.vue";
import { ref, onMounted } from "vue";
import axios from "axios";
import BlogCard from "../components/BlogCard.vue";

const blogs = ref([]);

const loadBlogs = async () => {
    try {
        const response = await axios.get("/blogs/all-latest");
        blogs.value = response.data.data;
        console.log(response.data);
    } catch (error) {
        console.error("Error loading blogs:", error);
    }
};

onMounted(() => {
    loadBlogs();
});
</script>

<template>
    <BlogHeader />
    <div class="container">
        <BlogCard v-for="blog in blogs" :key="blog.id" :blog="blog" />
    </div>
</template>

<style scoped>
.container {
    padding-top: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    height: 100vh;
}
</style>
