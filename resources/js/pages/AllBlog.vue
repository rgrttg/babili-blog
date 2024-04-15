<script setup>
import BlogHeader from "../components/BlogHeader.vue";
import BlogCard from "../components/BlogCard.vue";
import SearchBar from "../components/SearchBar.vue";

function getSuchInput(suchInhalt) {
    console.log(suchInhalt);
}
</script>
<template>
    <BlogHeader />
    <SearchBar v-on:suchen="getSuchInput" />
    <BlogCard />
</template>
<style scoped></style>
