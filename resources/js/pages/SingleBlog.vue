<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
// import { convertToHtml } from '@/components/Creator.vue';

const blog = ref(null);

const loadBlog = async () => {
  try {
    const response = await axios.get('/api/blogs/detail/2'); // Beispiel: ID 2
    blog.value = await response.data;
    // console.log(response.data);
  } catch (error) {
    console.error('Fehler beim Laden des Blogs:', error);
  }
};

// const someMethod = () => {
//   const html = convertToHtml(blog.content.value);
//   // Do something with the generated HTML
// };

onMounted(() => {
  loadBlog();
});
</script>

<template>
  
     <!-- <div class="header"> -->
    <!-- //hier kommt der header -->
  <!-- </div> -->

<div class="card">

  <div class="title" v-if="blog">
      <h1>{{ blog.title }}</h1>
  </div> 

  <div class="user-details">
    <div class="image">
        <img v-if="blog?.image_url" :src="blog?.image_url" class="profile-image"/>
    </div>
    <div class="socials">
      SOCIAL ICONS
    </div>
  </div>
      
  <div v-if="blog?.content" v-for="(entry,index) in blog.content" :key="index">
     
        <h2 v-if="entry.type='subtitle'">{{ entry.value }}</h2> 
     
        <p v-if="entry.type='paragraph'">{{ entry.value }}</p>
    
  </div>

  
</div>

</template>
 
<style scoped>

h1,h2, p {
    color: black;
}

.card {
  background-color: gainsboro;
  display: flex;
  flex-direction: column;
  padding: 10%;
}

.user-details {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
}

.profile-image {
  width: 100px; /* Ändern Sie die Breite und Höhe nach Bedarf */
  height: 100px;
  border-radius: 50%; /* Rundes Bild */
  object-fit: cover; /* Das Bild wird in das festgelegte Rechteck gezoomt, um es zu füllen */
}

</style>