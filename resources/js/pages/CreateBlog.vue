<script setup>
import { ref ,  onBeforeMount } from 'vue';
import { useRouter} from 'vue-router';
import axios from 'axios'; // HTTP-Client Biblio für die Kommunikation mit der API
// import { convertToHtml } from '@/components/Creator.vue';
// import Creator from '@/components/Creator.vue';

const showInput = ref(true); // Variable, um zu steuern, ob das Eingabefeld angezeigt werden soll

function hideTitleInput  () {
  showInput.value = false; // Setzen Sie showInput auf false, um das Eingabefeld zu verstecken
};


const router = useRouter();
const content = ref('');
// const blog = ref(null);

const blog = ref({
  title: '',
  description:'',
  content: []
});

const createBlog = async () => {
  try {
    let response = await axios.post('/api/blogs', {
      title: blog.value.title,
      description: blog.value.description,
      content: blog.value.content
    });
    
    // Erfolgsmeldung oder Weiterleitung zur Index-Seite
    router.push('/'); 
    
  } catch (error) {
    console.error('Fehler beim Erstellen des Tweets:', error);
  }
};
// const loadBlog = async () => {
//   try {
//     const response = await axios.get(`/api/blogs/detail/2`); //User_Picture+Name vom Dashboard API
//     blog.value = await response.data.;
//     // console.log(response.data);
//   } catch (error) {
//     console.error('Fehler beim Laden des Blogs:', error);
//   }
// };

// onBeforeMount(() => {
//   loadBlog();
// });

// // const someMethod = () => {
// //   const html = convertToHtml(blog.content.value);
// //   // Do something with the generated HTML
// // };

// onBeforeMount(() => {
//   loadBlog();
// });
</script>

<template>
  
     <!-- <div class="header"> -->
    <!-- //hier kommt der header -->
  <!-- </div> -->
<body>

  <div class="card">

      <div class="card-container">
        <form @submit.prevent="createBlog"></form>
          <div class="title" v-if="blog">
          
            <label for="title">Titel:</label>
            <input v-model="blog.title" type="text" id="title" required>
            <button @click="hideTitleInput">OK</button>
            <h1 v-if="showInput" @click="showInput = true">{{ blog.title }}</h1>
            <h1 v-else>{{ blog?.title }}</h1>
            <!-- <h1>{{ blog?.title }}</h1> -->
      
          
      </div>

      <div class="description" v-if="blog">
        <label for="description">Description:</label>
        <textarea v-model="blog.description" type="text" id="description"></textarea>
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
          

        <creator :content="blog?.content" @saved="getJson"/>

    </div>

  
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