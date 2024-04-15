<script setup>
import TestChild from "../components/TestChild.vue";
import { ref } from "vue";

function greet() {
    console.log("hallo");
}
</script>

<template>
    <TestChild @hallo="greet" />
</template>

<style scoped></style>
