<script setup>
import { ref } from "vue";
</script>

<template>
    <h1>Hallo</h1>
    <button @click="$emit('hallo')">click me</button>
</template>

<style scoped></style>
