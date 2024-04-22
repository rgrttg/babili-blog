<script setup>
import { ref, onBeforeMount } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import { authClient } from '@/services/AuthService';
import BlogHeader from '../components/BlogHeader.vue';
import axios from 'axios';



const route = useRoute();
const router = useRouter();
const blog = ref({
  title: '',
  description: '',
  content: '',
});


const loadBlog = async () => {
  try {
    const response = await authClient.get(`/blogs/detail/${route.params.id}`);
    blog.value = await response.data;
  } catch (error) {
    console.error('Fehler beim Laden des Blogs:', error);
  }
};

const editBlog = async () => {
  try {
    const response = await authClient.put(`/blogs/store/${route.params.id}`, blog.value);
    router.push('/');
  } catch (error) {
    console.error('Fehler beim Laden des Blogs:', error);
  }
};



onBeforeMount(() => {
  loadBlog();
});
</script>

<template>


  <BlogHeader />
  <div class="card">
    <div class="card-container">
      <div class="image">
        <img v-if="blog?.profile_picture" :src="blog?.profile_picture" class="profile-picture" />
      </div>
      <form @submit.prevent="editBlog" enctype="multipart/form-data">



        <!-- Titel -->
        
        <div class="title" v-if="blog">
          <label for="title" id="title" required> Titel:</label>
          <input type="text" v-model="blog.title">
        </div>

        <!-- Beschreibung -->
        <div class="description" v-if="blog">
          <label for="description">Beschreibung:</label>
          <textarea id="description" v-model="blog.description " rows="5">{{ blog?.description }}</textarea>
        </div>

        
        <!-- Benutzerdetails -->
        <div class="user-details">

          <span v-if="blog">{{ blog?.author_name }} </span>&nbsp;
          <span v-if="blog">{{ blog?.published_at }}</span>&nbsp;
          <!-- Profilbild und Autorinformationen -->
          <!-- Soziale Symbole -->
        </div>






        <div class="content">
          <label for="content">Beschrei
bung:</label>
          <textarea name="" v-model="blog.content"  rows="10">
        {{ blog?.content }} 
      </textarea>
        </div>

        <div class="buttons">
          <div class="submit">
          <button type="submit">Blog erstellen</button>
        </div>
      </div>
      </form>

    </div>
  </div>




  <!-- <div>
        <creator v-if="blog?.content" :content="blog?.content" @saved="getJson" />
      </div> -->





  <!-- <div>
    <creator @saved="getJson"/>
</div> -->



</template>

<style scoped>
/* *{
  box-sizing: border-box;
  margin:0;
  padding: 0;
} */

.user-details{
  margin-top: 5%;
}
 
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
  width: 100%;
}

.card-container {
  max-width: 80%;
  padding: 5%;
}

.title, .description, .content {
  display: flex;
  flex-direction: column;
  width: 32vw;
  margin-top: 5%;
}
 
.content {
  margin-top: 15%;
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

select {
  width: 100%;
  font-size: 20px;
}

button {
    font-size: 15px;
    color: white;
    background-color: black;
    border-radius: 15px;
}

.buttons {
  display: flex;
  flex-direction: column;
  font-size: 20px;
  display: flex;
  justify-content: space-between;
}

.submit {
  padding-top: 5%;
}
</style>