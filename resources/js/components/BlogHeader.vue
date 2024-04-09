<script setup>
import { useRoute } from 'vue-router';
import { useAuthStore } from "../stores/AuthStore"

const route = useRoute();
const store = useAuthStore();




</script>
<template>

    <header>
        <div id="header">
            <div class="left">
                <img v-if="route?.meta?.showLogo" src="/public/img/Logo-new.svg" alt="Tech Blog Logo" id="logo">

            </div>
            <div class="right">
                <ul class="menu">
                    <li v-if="route?.meta?.allBlogs" id="blogs">Alle Blogs</li>
                    <li v-if=" ! store?.authUser?.name " id="login">Login</li>
                    <li v-if="! store?.authUser?.name " id="sign">Sign</li>
                    <li v-if="! store?.authUser?.name" id="myProfile">My Profile </li>
                    <li v-if="! store?.authUser?.name" id="getStart">
                        <div id="getStartedButton">Get started</div>
                    </li>


                </ul>
            </div>
        </div>
    </header>
    <h1 class="hi">hiiii Girl</h1>
</template>
<style scoped>
#header {
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-items: center;
    height: 63px;
    width: 100vw;
    /* background-image: linear-gradient(135DEG , rgb(222,7,241), rgb(5,5,5)); */
    background-color: black;

}

.left {
    width: 50vw;
    height: 63px;
}

.right {
    width: 50vw;
    height: 63px;
}

.menu {
    display: flex;
    flex-direction: row;
    justify-content: end;
    list-style: none;
    gap: 20px;
    margin-right: 40px;
    align-items: center;
    height: 100%;
    margin-bottom: 0px;

    margin-top: 0px;
    font-weight: bold;

}

#getStartedButton {
    border: 2px solid white;
    border-radius: 30px;
    background-color: black;
    padding: 10px;
    font-weight: bold;
}

#logo {
    height: 70px;
}

@media only screen and (max-width: 600px) {
    #logo {
        height: 40px;
    }

    .menu {
        gap: 5px;
        margin-right: 5px;
        align-items: center;
        height: 100%;
        margin-bottom: 0px;
        margin-top: 0px;
        font-weight: bold;
        font-size: smaller;

    }

    #getStartedButton {
        border: 2px solid white;
        border-radius: 30px;
        background-color: black;
        padding: 2px;
        font-weight: bold;
    }
}
</style>