<script setup>
import BlogHeader from "../components/BlogHeader.vue";
import BlogCard from "../components/BlogCard.vue";

import { useAuthStore } from "@/stores/AuthStore";
import AuthService from "@/services/AuthService";
import { ref, onMounted, onBeforeMount } from "vue";
import { useRouter } from "vue-router";

const router = useRouter();
const store = useAuthStore();

const blogs = ref([]);

const loadBlogs = async () => {
    try {
        const response = await axios.get("/api/blogs/latest-three");
        blogs.value = response.data;
        // console.log(response.data);
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
    <div>
        <BlogCard
            v-for="blog in blogs.data"
            :key="blog.id"
            :card-content="blog"
        />
    </div>
</template>
