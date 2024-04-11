<script setup>
import BlogHeader from '../components/BlogHeader.vue';  
import BlogCard from "../components/BlogCard.vue";
import BlogHeroheader from '../components/BlogHeroheader.vue'
</script>

<template>
    <div class="hero">
       <BlogHeader/>  
        <BlogHeroheader class="heroHeader"/>

    </div>
    <div class="BlogCardContainer">
        <BlogCard />
    </div>
</template>
<style scoped>
.hero{
    display:flex;
    flex-direction: column;
}
 .heroHeader{
    width: 100vw; 
 }
.BlogCardContainer{
    display: flex;
    justify-content: center;
}

</style>
