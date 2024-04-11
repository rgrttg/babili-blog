<template>
    <!-- post list container -->
    <div class="post-list">
        <ul>
        <!-- post list item -->
        <!-- Use Vue's 'v-for' directive to loop through the posts array -->
            <li class="post-item" v-for="post in posts" :key="post.id">
            <!-- Display the post title -->
            <span class="post-title">{{ post.image_url }}</span>
            <h1 class="post-title">{{ post.title }}</h1>
            <p class="post-description"> {{ post.description }}</p>
            
            <!-- Container for action links -->
            <div class="action-links">
            <!-- Link to edit the post -->
            <router-link class="edit-link" :to="{ path: 'Editpost', params: { id: post.id } }">Edit</router-link>
            
            <!-- Link to view post details -->
            <router-link class="details-link" :to="{ name: 'blogdetail', params: { id: post.id } }">View Details {{ post.id }}</router-link>
            
            <!-- Button to delete the post -->
            <!-- Use Vue's 'v-on' directive (shorthand '@') to bind the click event with the 'deletepost' method -->
            <button class="delete-button" @click="deletepost(post.id)">Delete</button>
            </div>
            </li>
        </ul>
    </div>
</template>
    
<script setup>

import { onBeforeMount, ref } from 'vue';
import axios from 'axios';

const posts = ref([])


async function allPosts(){
    let res = await axios.get('api/blogs/all-latest');
    posts.value = res.data.data;
}
allPosts();
/* onBeforeMount(() => {
    allPosts();
}); */

</script>
    
<style scoped>
    .post-list {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    margin-top: 2vh;
    }
    
    .post-item {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px;
    margin: 8px 0;
    border-bottom: 1px solid #ddd;
    }
    
    .post-title {
    font-weight: bold;
    /* font-size: 1.1em; */
    color: black;
    }
    .post-description{
        font-size: 1.1em;
        color: black;
    }
    
    .action-links {
    display: flex;
    align-items: center;
    }
    
    .edit-link, .details-link, .delete-button {
    margin: 0 8px;
    font-size: 0.9em;
    }
    
    .edit-link, .details-link {
    text-decoration: none;
    color: #337ab7;
    }
    
    .delete-button {
    padding: 5px 10px;
    background-color: #f44336;
    color: #fff;
    border: none;
    border-radius: 4px;
    }
    
    .delete-button:hover {
    background-color: #d32f2f;
    cursor: pointer;
    }
</style>