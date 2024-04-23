<script setup>
import BlogHeader from "../components/BlogHeader.vue";
import BlogCard from "../components/BlogCard.vue";
import LogoutButton from "@/components/LogoutButton.vue";
import { useAuthStore } from "../stores/AuthStore";

import { ref, onMounted } from "vue";
import axios from "axios";
import { useRoute } from "vue-router";

const store = useAuthStore();

const user = ref({
    profilePicture: "https://example.com/profile.jpg",
    firstName: "John",
    lastName: "Doe",
    email: "john@example.com",
    skills: "Vue.js, JavaScript, HTML, CSS",
    bio: "Software developer passionate about web technologies.",
    socialMediaLinks: [
        "https://github.com/Ari-Ario?tab=repositories",
        "https://www.youtube.com/@khusrawz/videos",
    ],
});

let route = useRoute();
const userId = store?.authUser?.id;

const loadUser = async () => {
    try {
        const response = await axios.get(`api/user/profile/${userId}`);
        user.value = await response.data;
        console.log(response.data);
    } catch (error) {
        console.error("Error loading blogs:", error);
    }
};

onMounted(() => {
    loadUser();
});
</script>

<template>
    <BlogHeader />
    <section class="profile-section">
        <div class="user-profile">
            <div class="profile-header">
                <h1>Hallo {{ store?.authUser?.firstName }}</h1>
                <div class="profile-picture-container">
                    <div class="profile-picture">
                        <img
                            v-if="user.profilePicture"
                            :src="user.profile_picture"
                            alt="Profile Picture"
                        />
                        <img
                            v-else
                            src="../assets/Platzhalter-Bild.png"
                            alt="Default Profile Picture"
                        />
                    </div>
                </div>
                <div class="profile-details">
                    <h2>{{ user.firstName }} {{ user.lastName }}</h2>
                    <p>{{ user.email }}</p>
                    <p v-if="user.skills">
                        <strong>Skills:</strong> {{ user.skills }}
                    </p>
                    <p v-if="user.bio"><strong>Bio:</strong> {{ user.bio }}</p>
                    <div
                        class="social-media-links"
                        v-if="user.socialMediaLinks"
                    >
                        <strong>Social Media:</strong>
                        <ul>
                            <li
                                v-for="(link, index) in user.socialMediaLinks"
                                :key="index"
                            ></li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="profile-btn" v-if="store?.authUser">
                <button class="edit-profile-btn">
                    <router-link :to="{ name: 'editProfile' }" customv-slot="{ navigate }">
                            <div class="lin        </div>
k" @click="navigate" role="link">
                                Edit Profile
                            </div>
                        </router-link>
                    </button>
                </div>
                <div class="profile-btn">
                    <button class="edit-profile-btn">
                        <div class="link" @click="navigate" role="link">
                            <LogoutButton>Abmelden</LogoutButton>
                        </div>
                    </button>
                </div>
            </div>
            <div class="profile-btn" v-if="store?.authUser">
                <button class="edit-profile-btn">
                    <div class="link" @click="navigate" role="link">
                        <LogoutButton>Abmelden</LogoutButton>   
                    </div>
                </button>
            </div>


        <div class="own-posts">
            <BlogCard v-for="blog in user.blogs" :key="blog.id" :blog="blog" />
        </div>
    </section>
</template>

<style scoped>
.profile-section {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 90%;
}
.user-profile {
    max-width: 30%;
    height: 100vh;
    margin: 0 auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
}

.profile-header {
    display: block;
    align-items: center;
}

.profile-picture-container {        

    width: 120px;
    height: 120px;
    margin-right: 20px;
}

.profile-picture {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    overflow: hidden;
    border: 3px solid #ffffff;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.profile-picture img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    border-radius: 50%;
}

.profile-details {
    flex: 1;
}

.social-media-links {
    margin-top: 10px;
}

.social-media-links ul {
    list-style: none;
    padding: 0;
}

.social-media-links li {
    margin-bottom: 5px;
}

.social-media-links a {
    color: #007bff;
    text-decoration: none;
}

.social-media-links a:hover {
    text-decoration: underline;
}
.own-posts {
    width: 60%;
}

.profile-btn {
    text-align: center;
}
.edit-profile-btn {
    width: 100%;
    /* height: 30px; */
    background: black;
    border-radius: 50px;
    /* padding: 8px; */
    color: white;
    font-weight: bold;
    font-size: 14px;
    text-align: center;
    line-height: 30px;
    text-decoration: none;
    /* margin-left: 15px; */
    padding-left: 20px;
    padding-right: 20px;
}

.edit-profile-btn:hover {
    background-color: rgb(45, 45, 45);
}
</style>
