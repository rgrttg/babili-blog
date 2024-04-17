<script setup>
import { ref, onMounted, defineProps } from "vue";

defineProps({
    cardContent: {
        type: Object,
    },
});

// const blogs = ref([]);

// const loadBlogs = async () => {
//     try {
//         const response = await axios.get("/api/blogs/latest-three");
//         blogs.value = response.data;
//         console.log(response.data);
//     } catch (error) {
//         console.error("Error loading blogs:", error);
//     }
// };

onMounted(() => {
    loadBlogs();
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
        <div class="card">
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
                <div class="buttons">
                    <a class="button" href=""> Edit</a>
                    <a class="button" href=""> Delete</a>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
/* Existing styles */
.card {
    margin: 20px;
    border-radius: 10px;
    display: flex;
    align-items: center;
    background-color: #ffffff;
    max-width: 1200px;
    min-height: 300px;
    border: 1px solid rgba(0, 0, 0, 0.523);
}

.Photo {
    margin-left: 10px;
    width: 80%;
    height: 100%;
}

.details {
    height: 250px;
    display: flex;
    flex-direction: column;
    color: white;
    justify-content: space-between;
}

.user-photo {
    border-radius: 50%;
    overflow: hidden;
    margin-right: 10px;
}

.user-photo img {
    width: 50px;
    height: 50px;
    object-fit: cover;
}

.user-details {
    width: 350px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.read-more {
    text-decoration: none;
}

.title {
    font-size: 24px;
    font-weight: 400;
    color: #000000;
}

.description {
    font-size: 16px;
    font-weight: 200;
    color: #000000;
}

p {
    margin: 0;
}

.button {
    width: 100%;
    height: 30px;
    background: black;
    border-radius: 50px;
    padding: 8px;
    color: white;
    font-weight: bold;
    font-size: 14px;
    text-align: center;
    line-height: 30px;
    text-decoration: none;
    margin-left: 15px;
    padding-left: 20px;
    padding-right: 20px;
}

/* Responsive styles */
@media only screen and (max-width: 600px) {
    .card {
        flex-direction: column; /* Change flex direction to column */
        align-items: center;
        width: 90%;
        height: 100%;
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        padding-left: 20px;
        margin: 10px;
    }

    .Photo {
        display: none; /* Hide the Photo class */
    }

    .details {
        width: 100%;
        text-align: left;
    }

    .user-details {
        width: 90%;
        align-items: center;
    }

    .button {
        margin-top: 30px;
        width: 50%; /* Adjust button width */
    }
    .read-more {
        font-size: 15px;
        text-align: right;
        padding-right: 10px;
    }
}
</style>
