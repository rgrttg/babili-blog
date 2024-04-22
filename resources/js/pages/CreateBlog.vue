<script setup>
import BlogHeader from '../components/BlogHeader.vue';  
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios'; // HTTP-Client Biblio für die Kommunikation mit der API
// import { convertToHtml } from '@/components/Creator.vue';
// import Creator from '@/components/Creator.vue';

const getJson =(json) => {
    content.value = json;
};


const showInput = ref(true);
const router = useRouter();
const content = ref([]);
const blog = ref({
  title: '',
  description: '',
  content: [],
  image:'',
  tags: []
});

const selectedTag = ref('');
const tags = ref(['Tech', 'Wissen', 'Hilfe', 'Events','Jobs','Projekte','Stories']);
console.log(blog);
const createBlog = async () => {
  try {      const formData = new FormData();
    formData.append('title', blog.value.title);
    formData.append('description', blog.value.description);
    formData.append('image', blog.value.image); // 'file' ist die ausgewählte Bilddatei
    formData.append('content',blog.value.content);
    formData.append('tags', JSON.stringify(blog.value.tags));
    // Weitere Formulardaten hinzufügen, falls vorhanden


    let response = await axios.post('/api/blogs/store',formData);


    console.log(response);
    router.push('/');
  } catch (error) {
    console.error('Fehler beim Erstellen des Blogs:', error);
  }
};

const handleImageUpload = (event) => {
  const file = event.target.files[0];
  if (!file) return;

  const imageUrl = URL.createObjectURL(file);
  blog.value.blog_image = imageUrl;
  blog.value.image = event.target.files[0]
};
</script>
<template>

<BlogHeader/>

  <div class="card">
    <div class="card-container">
      <form @submit.prevent="createBlog" enctype="multipart/form-data">

        <!-- Image-Upload -->
        <div class="image">
          <img v-if="blog && blog.blog_image" :src="blog.blog_image" class="blog_picture" alt="Uploaded Image">
          <input type="file" id="blog_image" accept="image/*" @change="handleImageUpload">
        </div>
        
        <!-- Titel -->
        <div class="title" v-if="blog">
          <label for="title">Titel:</label>
          <input v-model="blog.title" type="text" id="title" required v-show="showInput">
          <h1>{{ blog?.title }}</h1>
        </div>

        <!-- Beschreibung -->
        <div class="description" v-if="blog">
          <label for="description"></label>
          <textarea v-model="blog.description" type="text" id="description" rows="5"></textarea>
          <p>{{ blog?.description }}</p>
        </div>

        
        <div class="tags">
          <label  v-for="(tag, index) in tags" :key="index"> 
            <input type="checkbox" :value="index+1" v-model="blog.tags">
            {{tag}}
          </label>
        </div>

        <!-- Benutzerdetails -->
        <div class="user-details">
          <!-- Profilbild und Autorinformationen -->
          <!-- Soziale Symbole -->
        </div>

        <!-- Editor für den Inhalt des Blogs -->
        <div class="content" v-if="blog">
          <label for="content">Beschreibung:</label>
          <textarea v-model="blog.content" type="text" id="content" rows="10"></textarea>
          <p>{{ blog?.content }}</p>
        </div>
        
        <!-- Button zum Blog erstellen -->
        <div class="buttons">
          
              <!-- <creator :content="blog?.content" @saved="getJson"/> -->
          <div class="submit">
              <button type="submit">Blog erstellen</button>
          </div>
        </div>
      </form>
    </div>
  </div>
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
  margin-top:  15%;
  display: flex;
  align-items: center;
  flex-direction: column;
  height: 100%;
  font-size: 20px;
}

.card-container {
  max-width: 80%;
  padding: 5%;
}

.title, .description, .content {
  display: flex;
  flex-direction: column;
  width: 100%;
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