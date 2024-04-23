<script setup>
import BlogHeader from '../components/BlogHeader.vue';  
import LogoutButton from "@/components/LogoutButton.vue";
import { useAuthStore } from "../stores/AuthStore";
import { ref, onBeforeMount, onMounted } from 'vue';
import axios from "axios";
import {useRoute} from 'vue-router';

const store = useAuthStore();
const route = useRoute();

let user = ref({
  profile_picture: null,
  firstName: 'John',
  lastName: 'Doe',
  email: 'john@example.com',
  interests: '',
  about_me: '',
  socials: ['']
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
    const imageUrl = URL.createObjectURL(file);
    // profilePictureFile = file;
    user.value.preview = imageUrl;
    user.value.profile_picture = file;

    user.value.profile_picture = event.target.files[0];

  }
};

const addSocialMediaLink = () => {
  user.value.socials.push('');
};

const removeSocialMediaLink = (index) => {
  user.value.socials.splice(index, 1);
};

const saveChanges = () => {
  // Logic to update user profile (send data and image to backend)
  try {
      // const formData = new FormData();
      // formData.append('profile_picture', user.value.profile_picture);
      // formData.append('firstName', user.value.firstName);
      // formData.append('lastName', user.value.lastName); // 'file' ist die ausgewählte Bilddatei
      // formData.append('about_me', user.value.about_me);
      // formData.append('interests', JSON.stringify(user.value.interests));

    const response = axios.put(`api/user/profile-information`, user.value);
    // Optionally, show a success message to the user
    // console.log('Profile updated successfully:', response.data);
  } catch (error) {
    console.error("Error loading blogs:", error);
    }
  };


  ////////////////////////////////////////CAMERA//////////////////////////////////
  const video = ref(null);
  const canvas = ref(null);

    const initCamera= async () => {
      try {
        const stream = await navigator.mediaDevices.getUserMedia({ video: true });
        video.value.srcObject = stream;
      } catch (error) {
        console.error('Error accessing camera:', error);
      }
    }

    const takePicture = () => {
      const video = video.value;
      const canvas = canvas.value;
      const context = canvas.getContext('2d');

      // Set canvas dimensions to match video
      canvas.width = video.videoWidth;
      canvas.height = video.videoHeight;

      // Draw video frame onto canvas
      context.drawImage(video, 0, 0, canvas.width, canvas.height);

      // Convert canvas content to data URL
      const dataURL = canvas.toDataURL('image/png');

      // Initialize camera on component mount
      initCamera();

      return { video, canvas, takePicture };
      // You can now use the dataURL for further processing, e.g., uploading to server
      console.log('Picture taken:', dataURL);
    }

// onMounted (() =>{
//   initCamera();
// });
</script>

<template>
    <BlogHeader/>

  <div class="edit-profile">
    <h1>Edit Profile</h1>
    <div class="profile-picture-container">
      <input type="file" id="profile-picture" accept="image/*" @change="handleProfilePictureChange">
      <div class="profile-picture">
        <img v-if="user.profile_picture" :src="user.preview" alt="Profile Picture">
        <img v-else src="../assets/Platzhalter-Bild.png" alt="Default Profile Picture">
      </div>
    </div>

<!--     <div>
      <video ref="video" autoplay></video>
      <button @click="takePicture">Take Picture</button>
      <canvas ref="canvas" style="display: none;"></canvas>
    </div> -->

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
        <div v-for="(link, index) in user.socials" :key="index" class="social-media-input">
          <input type="text" v-model="user.socials[index]" placeholder="Enter link">
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
  display: block;
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
