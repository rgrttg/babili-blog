<script setup>
import { ref, defineProps } from "vue";

const suchInhalt = ref("");
</script>

<template>
    <div class="search-bar">
        <input
            type="text"
            name=""
            id="suchen"
            placeholder="suchen"
            v-model="suchInhalt"
        />
        <button @click="$emit('suchen', suchInhalt)">suchen</button>
    </div>
</template>

<style scoped>
.search-bar {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 2rem;
}
</style>
