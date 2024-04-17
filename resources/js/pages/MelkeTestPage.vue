<script setup>
import Melke from "../components/MelkeTestComp.vue";
import { ref, onMounted, defineProps } from "vue";

const content = [
    { vorname: "Melke", nachname: "tesfay" },
    { vorname: "roger", nachname: "federer" },
    { vorname: "albert", nachname: "einstein" },
    { vorname: "david", nachname: "hilbert" },
    { vorname: "Melke", nachname: "tesfay" },
];
</script>

<template>
    <Melke :card-content="content" />
</template>

<style scoped>
/* Existing styles */
</style>
