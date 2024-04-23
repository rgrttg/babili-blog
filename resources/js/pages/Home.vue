<script setup>
import BlogHeader from "../components/BlogHeader.vue";
import BlogCard from "../components/BlogCard.vue";
import BlogHeroheader from "../components/BlogHeroheader.vue";
import axios from "axios";
import { ref, onMounted } from "vue";

const blogs = ref([]);

const loadBlogs = async () => {
    try {
        const response = await axios.get("/api/blogs/latest-three");
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
    <div class="hero">
        <div class="blogHeader">
            <BlogHeader />
        </div>
        <BlogHeroheader class="heroHeader" />
    </div>
    <div class="BlogCardContainer">
        <BlogCard v-for="blog in blogs" :key="blog.id" :blog="blog" />
    </div>
</template>
<style scoped>

.blogHeader {
    z-index: 3;
}
.hero {
    display: flex;
    flex-direction: column;
}
.heroHeader {
    width: 100vw;
}
.BlogCardContainer {
    align-items: center;
    display: flex;
    flex-direction: column;
    justify-content: center;
}
</style>
