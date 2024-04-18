<script setup>
import { ref, onBeforeMount } from 'vue';
import { useRoute, useRouter } from 'vue-router';
import { authClient } from '@/services/AuthService';


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

  <!-- ES MUSS NOCH EINGEFÜGT WERDEN IF IS AUTHENTICATED NUR DANN KANN MAN EDITIEREN-->
  <!-- <div class="header"> -->
  <!-- //hier kommt der header -->
  <!-- </div> -->

  <body>

    <div class="card">

      <div class="card-container">
        <form @submit.prevent="editBlog" enctype="multipart/form-data">

          <label for="title"> Title</label>
          <div class="title" v-if="blog">
            <input type="text" v-model="blog.title">
          </div>

          <label for="description">Description</label>

          <div class="description" v-if="blog">
            <textarea name="" v-model="blog.description" cols="30" rows="3">{{ blog?.description }}</textarea>
          </div>

          <label for="content">content</label>
          <div>
            <textarea name="" v-model="blog.content" cols="30" rows="10">
        {{ blog?.content }} 
      </textarea>
          </div>
          <div class="submit">
              <button type="submit">Blog erstellen</button>
          </div>
        </form>

          <div class="user-details">
            <div class="image">
              <img v-if="blog?.profile_picture" :src="blog?.profile_picture" class="profile-picture" />
              <div class="author-info">
                <span v-if="blog">{{ blog?.author_name }} </span>&nbsp;
                <span v-if="blog">{{ blog?.published_at }}</span>
              </div>
            </div>

            <div class="socials">
              SOCIAL ICONS
            </div>
        
      </div>
    </div>




    <!-- <div>
        <creator v-if="blog?.content" :content="blog?.content" @saved="getJson" />
      </div> -->
    </div>
  </body>



  <!-- <div>
    <creator @saved="getJson"/>
</div> -->



</template>

<style scoped>
body {
  height: 100%;
  background-color: gainsboro;
}

h1,
h2,
p {
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
  width: 100px;
  /* Ändern Sie die Breite und Höhe nach Bedarf */
  height: 100px;
  border-radius: 50%;
  /* Rundes Bild */
  object-fit: cover;
  /* Das Bild wird in das festgelegte Rechteck gezoomt, um es zu füllen */
}

.author-info {
  margin-left: 10px;
}
</style>