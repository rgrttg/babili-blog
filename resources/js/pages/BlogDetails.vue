<template>
    <!-- post details container -->
    <!-- Use Vue's 'v-if' directive to render this container only if 'post' is truthy -->
    <div v-if="post" class="post-details">
    <!-- Display the post name -->
    <h2 class="post-title">{{ post.title }}</h2>
    <!-- Display the post description -->
    <p class="post-description">{{ post.description }}</p>
    <!-- Display the post price -->
    <p class="post-price">Price: ${{ post.price }}</p>
    </div>
</template>
    
<script>
    import axios from 'axios'; // Import the axios instance
    import { onBeforeMount, ref } from 'vue';

    const posts = ref([])
    //const postId = this.$route.params.id;

    async function Post(){
        let res = await axios.get(`api/blogs/detail/1`);
        posts.value = res.data.data;
        console.log(res);
    }
    Post();
    
    // export default {
    // // Component data
    //     data() {
    //         return {
    //             // Initialize post as null
    //             post: null
    //         };
    //         },
    //         // Lifecycle hook that is called after the instance has been mounted
    //         async mounted() {
    //             // Get the post ID from the route params
    //             const postId = this.$route.params.id;
    //         try {
    //             // Make a GET request to the API to fetch the post data
    //             const response = await axios.get(`/blogs/detail/${postId}`);
    //             // Update the post data with the data from the API
    //             this.post = response.data;
    //         } catch (error) {
    //             // If an error occurs, log it to the console
    //             console.error("An error occurred while fetching the post:", error);
    //         }
    //     }
    // };
</script>
    
<style scoped>
    .post-details {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    }
    
    .post-title {
    margin-bottom: 20px;
    font-size: 2em;
    }
    
    .post-description {
    font-size: 1.2em;
    }
    
    .post-price {
    margin-top: 20px;
    font-size: 1.2em;
    font-weight: bold;
    }
</style>