<script setup>
import { useAuthStore } from '@/stores/AuthStore';
import AuthService from "@/services/AuthService";
import {ref} from 'vue';
import {useRouter} from 'vue-router';
import Navbar from '@/components/Navbar.vue';

import { createStore } from 'vuex';
import { Axios } from 'axios';

const router = useRouter();
const store = useAuthStore();

const user = ref({
    name : '',
    email : '',
    password : '',
    password_confirmation : ''
});
function registerUser(){
    AuthService.registerUser(user.value)
        .then(() => router.push("/dashboard"))
        .catch((error) => (console.log(error)));
}

// const register = async() => {

//     try {

//         await AuthService.registerUser(user.value);
        
//         // router.push("/dashboard");

//         const authUser = await store.getAuthUser();

//         if(authUser) {
//           router.push("/dashboard");
//         }
//         else {
//             console.log('error');
//         }
//       } catch (error) {
//         console.log(error);
//       }
// }

</script>

<template>
    <Navbar></Navbar>
    <!-- Form for registration -->
    <div class="form-container">
        <form @submit.prevent="registerUser" class="register-form">
        <!-- Name, email, and password inputs -->
        <input name="name" type="text" v-model="user.name" placeholder="Name" required />
        <input name="email" type="email" v-model="user.email" placeholder="Email" required />
        <input name="password" type="password" v-model="user.password" placeholder="Password" required />
        <input name="password_confirmation"  type="password"  v-model="user.password_confirmation" placeholder="Password" required />


        <button type="submit">Register</button>


        <div>
            <router-link to="/">Link zur Homepage</router-link>
        </div>

        </form>
    </div>

</template>

<style scoped>
.form-container {
display: flex;
justify-content: center;
align-items: center;
}


.register-form {
display: flex;
flex-direction: column;
gap: 20px;
width: 300px;
padding: 20px;
border-radius: 5px;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}


.register-form input, .register-form button {
padding: 10px;
border-radius: 5px;
border: 1px solid #ccc;
font-size: 16px;
}


.register-form button {
background-color: #007BFF;
color: white;
cursor: pointer;
}
</style>