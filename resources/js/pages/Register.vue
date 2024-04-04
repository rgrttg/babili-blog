<script setup>
import { useAuthStore } from '@/stores/AuthStore';
import AuthService from "@/services/AuthService";
import {ref} from 'vue';
import {useRouter} from 'vue-router';

const router = useRouter();
const store = useAuthStore();

const user = ref({
    email : '',
    password : ''
});


const login = async() => {

    try {

        await AuthService.login(user.value);

        const authUser = await store.getAuthUser();

        if(authUser) {
          router.push("/register");
        }
        else {
            console.log('error');
        }
      } catch (error) {
        console.log(error);
      }
}

/* export default {
    data() {
        return {
        // Data model for the form inputs
        name: "",
        email: "",
        password: ""
        };
    },
    methods: {
        async register() {
            try {
            // Making POST request to "/register" endpoint with name, email, and password as data
            const response = await axios.post("/register", {
            name: this.name,
            email: this.email,
            password: this.password
            });
            // Here you could handle the response, for example, store the received token,
            // update the 'isLoggedIn' state, and redirect to the dashboard or any other page
            }
            catch (error) {
            console.error("An error occurred:", error);
            if (error.response) {
            console.error('Error details:', error.response.data);
            }
            }
        }
    }
}; */
</script>

<template>

    <!-- Form for registration -->
    <div class="form-container">
        <form @submit.prevent="register" class="register-form">
        <!-- Name, email, and password inputs -->
        <input type="text" v-model="name" placeholder="Name" required />
        <input type="email" v-model="email" placeholder="Email" required />
        <input type="password" v-model="password" placeholder="Password" required />

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