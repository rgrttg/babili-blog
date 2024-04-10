<script setup>
import BlogHeader from '../components/BlogHeader.vue';  


</script>

<template>

    <header>

    </header>    
    
    
    <div class="head">
        <h1>Blog Erstellen</h1>
    </div>

    <div class="create-container">

        <div class="left-container">

        </div>

        <div class="right-container">

        </div>

    </div>

</template>
<BlogHeader/>

<style scoped>

.create-container {
    min-height: 100vh;
    width: 100%;
    display: flex;
}

left-container, .right-container {
    height: 100vh;
    display: flex;
    align-items: center;
}

.left-container {
    width: 30%;
    background: rgb(178, 102, 102);
}

.right-container {
    width: 70%;
    background: black;
}

</style>