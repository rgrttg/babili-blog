<script setup>
import { useRoute } from 'vue-router';
import { useAuthStore } from "../stores/AuthStore"
import LogoutButton from '@/components/LogoutButton.vue';
const route = useRoute();
const store = useAuthStore();




</script>
<template>

    <header>
        <div id="header">
            <div class="left">
                <img v-if="route?.meta?.showLogo" src="../assets/logo.svg" alt="Tech Blog Logo" id="logo">

            </div>
            <div class="right">
                <ul class="menu">
                    <li >
                        <router-link :to="{ name: 'home' }" customv-slot="{ navigate }">
                            <div class="link" @click="navigate" role="link">
                                Home
                            </div>
                        </router-link>
                    </li>

                    <li id="blogs">
                        <router-link :to="{ name: 'allBlogs' }" customv-slot="{ navigate }">
                            <div class="link" @click="navigate" role="link">
                                Alle Blogs
                            </div>
                        </router-link>
                    </li>

                    <li v-if="!store?.authUser" id="login">

                        <router-link :to="{ name: 'login' }" customv-slot="{ navigate }">
                            <div class="link" @click="navigate" role="link">
                                Anmelden
                            </div>
                        </router-link>
                    </li>

                    
                    <li v-if="store?.authUser?.name" id="myProfile">
                        <router-link :to="{ name: 'profile' }" customv-slot="{ navigate }">
                            <div class="link" @click="navigate" role="link">
                                Mein Profil
                            </div>
                        </router-link> <!-- <li v-if="store?.authUser?.name" id="logout"> -->

                    </li>
                    <li v-if="store?.authUser" id="createPost">
                        <router-link :to="{ name: 'createPost' }" customv-slot="{ navigate }">
                            <div class="link" @click="navigate" role="link">
                                Blog erstellen
                            </div>
                        </router-link>
                    </li>
                    <!-- <li v-if="store?.authUser?.name" id="logout"> -->

                    <li v-if="!store?.authUser" id="getStarted">
                        <router-link :to="{ name: 'register' }" customv-slot="{ navigate }">
                            <div class="link" @click="navigate" role="link">
                                <div class="link" id="getStartedButton">
                                    los legen
                                </div>
                            </div>
                        </router-link>
                    </li>
                    <li v-if="store?.authUser" id="editProfile">
                        <router-link :to="{ name: 'editProfile' }" customv-slot="{ navigate }">
                            <div class="link" @click="navigate" role="link">
                                Edit Profil
                            </div>
                        </router-link>
                    </li>

                    <li v-if="store?.authUser" id="dashboard">
                        <router-link :to="{ name: 'dashboard' }" customv-slot="{ navigate }">
                            <div class="link" @click="navigate" role="link">
                                Dashboard
                            </div>
                        </router-link>
                    </li>
                    
                    <li v-if="store?.authUser" id="logout">
                        <div>
                            <LogoutButton>Abmelden</LogoutButton>
                        </div>

                    </li>
                </ul>

            </div>
        </div>
    </header>

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
    color: white;

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

.link {
    text-decoration: none;
    color: white;
    font-family: Arial, sans-serif;


}


#getStartedButton {
    border: 2px solid white;
    border-radius: 30px;
    background-color: black;
    padding: 10px;
    font-weight: bold;
}

#logo {
    
    height: 50px; /* by desiding the logo hight */
   
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

@media only screen and (max-width: 375px) {
  #logo {
    height: 40px;
  }

  .menu {
    gap: 10px;
    margin-right: 10px;
    font-size: smaller;
  }

  #logo {
    display: none;
  }
}
</style>