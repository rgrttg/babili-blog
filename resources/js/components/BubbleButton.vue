<script setup>
const stringArray = ref(["Apple", "Banana", "Cherry", "Date"]);
</script>

<template>
    <div class="bubble-container">
        <a href="">
            <button v-for="item in stringArray" :key="item" class="bubble">{{ item }}</button>
        </a>
        </div>
</template>

<style scoped>
.bubble-container {
    margin: 15px 0 0 150px;
}

.bubble {
    font-size: 18px;
    font-weight: 600;
    color: red;
    border: 2px solid rgb(231, 231, 231);
    border-radius: 1.2rem;
    background-color: transparent;
    color: rgb(231, 231, 231);
    padding: 10px 20px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.bubble:hover{
    background-color: rgba(120, 118, 118, 0.3);
}
</style>