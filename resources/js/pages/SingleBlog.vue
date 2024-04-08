<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';
// import { convertToHtml } from '@/components/Creator.vue';

const blog = ref(null);

const loadBlog = async () => {
  try {
    const response = await axios.get('/api/blogs/detail/2'); // Beispiel: ID 2
    blog.value = await response.data;
    console.log(response.data);
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
  <div v-if="blog">
    <h1>{{ blog.title }}</h1>
    <p>{{ blog.content }}</p>
  </div>
</template>
 
<style scoped>
h1, p {
    color: white;
}

</style>