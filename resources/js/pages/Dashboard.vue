<script setup>
import { useAuthStore } from "../stores/AuthStore";
import AuthService from "@/services/AuthService";
import { useRouter } from 'vue-router';
import { onMounted, onBeforeMount } from "vue";
import LogoutButton from "@/components/LogoutButton.vue";
import BlogHeader from '../components/BlogHeader.vue';


const router = useRouter();
const store = useAuthStore();
const check = async () => {

    try {



        const authUser = await store.getAuthUser();

        if (!authUser) {
            console.log("not logged in")
            router.push("/register");
        }
        else {

        }
    } catch (error) {
        console.log(error);
    }
}

onBeforeMount(() => {

    check()
})

</script>

<template>
    <BlogHeader />
    <header>
        <LogoutButton />
    </header>
    <span>Dashboard</span>
    <h1>Hallo {{ store?.authUser?.name }}</h1>
    <BlogCardSelf></BlogCardSelf>
</template>
