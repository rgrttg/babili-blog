<template>
    <BlogHeader></BlogHeader>
    <!-- blog details container -->
    <!-- Use Vue's 'v-if' directive to render this container only if 'blog' is truthy -->
    <div v-if="blog" class="blog-details">
    <!-- Display the blog name -->
    <h2 class="blog-title">{{ blog.title }}</h2>
    <!-- Display the blog description -->
    <p class="blog-description">{{ blog.description }}</p>
    <!-- Display the blog content -->
    <p class="blog-content">{{ blog.content }}</p>
    </div>
</template>
    
<script setup>
    import axios from 'axios'; // Import the axios instance
    import { onBeforeMount, ref } from 'vue';
    import {useRoute} from 'vue-router';

    import BlogHeader from '../components/BlogHeader.vue';

    const blog = ref(null);
    const route = useRoute();

    const loadBlog = async () => {
    try {
        const response = await axios.get(`/api/blogs/detail/${route.params.id}`); // Beispiel: ID 2
        blog.value = await response.data;
        // console.log(response.data);
    } catch (error) {
        console.error('Fehler beim Laden des Blogs:', error);
    }
    };


    onBeforeMount(() => {
    loadBlog();
    });
    
</script>
    
<style scoped>
    .blog-details {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #f9f9f9;
    color: black;
    border-radius: 8px;
    }
    
    .blog-title {
    margin-bottom: 20px;
    font-size: 2em;
    }
    
    .blog-description {
    font-size: 1.2em;
    font-weight: bold;
    }
    
    .blog-content {
    margin-top: 20px;
    font-size: 1.2em;
    }
</style>