<script setup>
    import axios from 'axios'; // Import the axios instance
    import { ref , onMounted, onBeforeMount } from 'vue';
    import {useRoute} from 'vue-router';
    import {authClient} from '@/services/AuthService';

    const bubbles = ref(null);
    // const route = useRoute();

    const loadBobles = async () => {
    try {
        const response = await authClient.get('/tags'); 
        bubbles.value = await response.data;
        console.log(response.data);
    } catch (error) {
        console.error('Fehler beim Laden des Blogs:', error);
    }
}
    onBeforeMount(() => {
        loadBobles();
        });
    
    
</script>

<template>
    <div class="bubble-container">

        <router-link v-for="item in bubbles" :key="item.tag" :to="{ name: 'allBlogs', params: { tag: item.tag.toLowerCase()  } }" customv-slot="{ navigate }">
            <button class="bubble">{{ item.tag }}</button>
        </router-link>
        </div>
</template>

<style scoped>


.bubble {
    margin: 10px 10px 0 0;
    font-size: 18px;
    font-weight: 600;
    border: 2px solid rgb(231, 231, 231); 
    border-radius: 1.2rem;
    background-color: transparent;
    color: rgb(231, 231, 231);
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    gap: 10px;
}

.bubble:hover{
    background-color: rgba(120, 118, 118, 0.3);
}
</style>