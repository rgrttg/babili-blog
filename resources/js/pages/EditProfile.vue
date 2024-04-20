<script setup>
import BlogHeader from '../components/BlogHeader.vue';  
import LogoutButton from "@/components/LogoutButton.vue";
import { useAuthStore } from "../stores/AuthStore";
import { ref, onBeforeMount } from 'vue';
import axios from "axios";
import {useRoute} from 'vue-router';

const store = useAuthStore();
const route = useRoute();

let user = ref({
  profilePicture: null,
  firstName: 'John',
  lastName: 'Doe',
  email: 'john@example.com',
  interests: '',
  about_me: '',
  socialMediaLinks: ['']
});

const userId = store.authUser.id;

let profilePictureFile = null;

const loadUser = async () => {
    const userId = useRoute();
    try {
        // console.log(route.params.id);
        const response = await axios.get(`api/user/profile`); // or 1
        user.value = await response.data;
        console.log(response.data);
    } catch (error) {
        console.error("Error loading blogs:", error);
    }
};

onBeforeMount(() => {
    loadUser();
});


const handleProfilePictureChange = (event) => {
  const file = event.target.files[0];
  if (file) {
    // const imageUrl = URL.createObjectURL(file);
    profilePictureFile = file;
    user.value.profile_picture = URL.createObjectURL(file);
    user.value.image = event.target.files[0]

  }
};

const addSocialMediaLink = () => {
  user.value.socialMediaLinks.push('');
};

const removeSocialMediaLink = (index) => {
  user.value.socialMediaLinks.splice(index, 1);
};

const saveChanges = () => {
  // Logic to update user profile (send data and image to backend)
  try {
    const response = axios.put(`/api/user/store/1`, user.value);
    // Optionally, show a success message to the user
    console.log('Profile updated successfully:', response.data);
  } catch (error) {
    console.error("Error loading blogs:", error);
    }
};
</script>

<template>
    <BlogHeader/>

  <div class="edit-profile">
    <h1>Edit Profile</h1>
    <div class="profile-picture-container">
      <input type="file" id="profile-picture" accept="image/*" @change="handleProfilePictureChange">
      <div class="profile-picture">
        <img v-if="user.profile_picture" :src="user.profile_picture" alt="Profile Picture">
        <img v-else src="../assets/Platzhalter-Bild.png" alt="Default Profile Picture">
      </div>
    </div>
    <div class="form-group">
      <label for="first-name">First Name</label>
      <input type="text" id="first-name" v-model="user.firstName">
    </div>
    <div class="form-group">
      <label for="last-name">Last Name</label>
      <input type="text" id="last-name" v-model="user.lastName">
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" id="email" v-model="user.email" disabled>
    </div>
    <div class="form-group">
      <label for="interests">interests</label>
      <input type="text" id="interests" v-model="user.interests">
    </div>
    <div class="form-group">
      <label for="about_me">about_me</label>
      <textarea id="about_me" v-model="user.about_me"></textarea>
    </div>
    <div class="form-group">
      <label for="social-media">Social Media Links</label>
      <div class="social-media-inputs">
        <div v-for="(link, index) in user.socialMediaLinks" :key="index" class="social-media-input">
          <input type="text" v-model="user.socialMediaLinks[index]" placeholder="Enter link">
          <button @click="removeSocialMediaLink(index)">Remove</button>
        </div>
        <button @click="addSocialMediaLink">Add Social Media Link</button>
      </div>
    </div>
    <button @click="saveChanges">Save Changes</button>
  </div>
</template>

<style scoped>
.edit-profile {
  max-width: 600px;
  margin: 0 auto;
}

.form-group {
  margin-bottom: 20px;
}

label {
  display: block;
  font-weight: bold;
}

input[type="text"],
input[type="email"],
textarea {
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 5px;
}

input[type="file"] {
  margin-top: 5px;
}

button {
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

button:hover {
  background-color: #45a049;
}

.social-media-inputs {
  display: flex;
  flex-direction: column;
}

.social-media-input {
  display: flex;
  align-items: center;
}

.social-media-input input {
  flex: 1;
}

.social-media-input button {
  margin-left: 10px;
}

.profile-picture-container {
  position: relative;
  width: 200px;
  height: 200px;
  margin-bottom: 20px;
}

.profile-picture-container input[type="file"] {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  opacity: 0;
  cursor: pointer;
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
</style>
