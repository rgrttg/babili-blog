<script setup>
import { ref, onMounted, defineProps } from "vue";

defineProps({
    cardContent: {
        type: Array,
    },
});
</script>

<template>
    <div v-for="(item, i) in cardContent" :key="i">
        <h1>{{ item.vorname }}=>{{ item.nachname }}</h1>
    </div>
</template>

<style scoped>
/* Existing styles */
</style>
