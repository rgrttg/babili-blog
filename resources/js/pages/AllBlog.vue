<script setup>
import BlogHeader from "../components/BlogHeader.vue";
import { ref, onMounted, watch } from "vue";
import axios from "axios";
import BlogCard from "../components/BlogCard.vue";
import Bubbles from "@/components/BubbleButton.vue";
import { useRoute } from "vue-router";

const blogs = ref([]);
const route = useRoute();

const loadBlogs = async () => {
    try {
        const response = await axios.get("/api/blogs/all-latest");
        blogs.value = response.data.data;
        console.log(response.data);
    } catch (error) {
        console.error("Error loading blogs:", error);
    }
};
watch(route.params.tag, (newValue, oldValue) => {
    if (newValue !== oldValue) {
        getTags(newValue);
    }
});
const getTags = async () => {
    try {
        const response = await axios.get(
            `/api/blogs/by-tags?tags=${route.params.tag}`
        );
        blogData.value = response.data;
    } catch (error) {
        console.error("Error loading blog:", error);
        setTimeout(() => {
            loadBlog();
        }, 3000);
    }
};

onMounted(() => {
    loadBlogs();
});
</script>

<template>
    <BlogHeader />
    <div class="bubbles">
        <Bubbles />
    </div>
    <div class="container">
        <BlogCard v-for="blog in blogs" :key="blog.id" :blog="blog" />
    </div>
</template>

<style scoped>
.bubbles {
    display: flex;
    justify-content: center;
    background: linear-gradient(
        180deg,
        rgba(0, 0, 0, 1) 0%,
        rgba(59, 57, 57, 1) 86%,
        rgba(109, 109, 109, 1) 100%
    );
    padding-bottom: 30px;
}
.container {
    padding-top: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
}
</style>
