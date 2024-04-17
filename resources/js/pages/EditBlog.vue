<script setup>
import { ref, onBeforeMount } from 'vue';
import axios from 'axios';
// import { convertToHtml } from '@/components/Creator.vue';
// import Creator from '@/components/Creator.vue';

const content = ref('');
const blog = ref(null);
const getJson =(json) => {
    content.value = json;
};
// const blogId = this.$router.
const loadBlog = async () => {
  try {
    const response = await axios.get(`/api/blogs/detail/${route.params.id}`); // Beispiel: ID 2
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

onBeforeMount(() => {
  loadBlog();
});
</script>

<template>
  <!-- ES MUSS NOCH EINGEFÜGT WERDEN IF IS AUTHENTICATED NUR DANN KANN MAN EDITIEREN-->
     <!-- <div class="header"> -->
    <!-- //hier kommt der header -->
  <!-- </div> -->
<body>
<div class="card">

  <div class="card-container">
  <div class="title" v-if="blog">
      <h1>{{ blog?.title }}</h1>
  </div> 

  <div class="description" v-if="blog">
    <p>{{ blog?.description }}</p>
  </div>

  <div class="user-details">
    <div class="image">
            <img v-if="blog?.profile_picture" :src="blog?.profile_picture" class="profile-picture"/>
        <div class="author-info">
            <span v-if="blog">{{ blog?.author_name }} </span>&nbsp;
            <span v-if="blog">{{ blog?.published_at }}</span>
        </div>
    </div>
    
    <div class="socials">
      SOCIAL ICONS
    </div>
  </div>
      

    <creator v-if="blog?.content" :content="blog?.content" @saved="getJson"/>

    

  
 

</div>
<!-- <div>
    <creator @saved="getJson"/>
</div> -->
  
</div>
</body>
</template>
 
<style scoped>

body {
  height: 100%;
  background-color: gainsboro;
}

h1,h2, p {
    color: black;
}

p {
    line-height: 1.3;
}

.card {
  display: flex;
  align-items: center;
  flex-direction: column;
  height: 100%;
  font-size: 20px;
}

.card-container {
  max-width: 750px;
  padding: 5%;
}

.user-details {
  display: flex;
  flex-direction: row;
  align-items: center;
  justify-content: space-between;
}

.image {
  display: flex;
  flex-direction: row;
  align-items: center;
}

.profile-picture {
  width: 100px; /* Ändern Sie die Breite und Höhe nach Bedarf */
  height: 100px;
  border-radius: 50%; /* Rundes Bild */
  object-fit: cover; /* Das Bild wird in das festgelegte Rechteck gezoomt, um es zu füllen */
}

.author-info {
  margin-left: 10px;
}

</style>