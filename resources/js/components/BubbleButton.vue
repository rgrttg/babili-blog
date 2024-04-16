<script setup>
import { ref, onMounted, defineProps } from "vue";
import axios from "axios";

defineProps({
    cardContent: {
        type: Object,
    },
});

const truncate = (text, maxLength) => {
    if (text.length > maxLength) {
        return text.substring(0, maxLength) + "...";
    } else {
        return text;
    }
};
</script>

<template>
    <div>
        <div class="card" v-for="blog in cardContent.data" :key="blog.id">
            <div class="Photo">
                <img
                    class="Photo"
                    :src="blog.blog_image || '../assets/Platzhalter-Bild.png'"
                    alt=""
                />
            </div>
            <div class="details">
                <div class="title" v-if="blog">
                    {{ blog.title }}
                </div>
                <p v-if="blog" class="description">
                    {{ truncate(blog.description, 200) }}
                </p>
                <div class="user-details">
                    <div class="user-photo">
                        <img
                            class="user-photo"
                            v-if="blog.profile_picture"
                            :src="blog.profile_picture"
                        />
                    </div>
                    <p v-if="blog" class="user-name description">
                        {{ blog.author_name }}
                    </p>
                    <p v-if="blog" class="published-on description">
                        {{ blog.updated_at }}
                    </p>
                </div>

                <router-link
                    class="details-link"
                    :to="{ name: 'blogdetail', params: { id: blog.id } }"
                    >View Details</router-link
                >
            </div>
        </div>
    </div>
</template>

<style scoped></style>
