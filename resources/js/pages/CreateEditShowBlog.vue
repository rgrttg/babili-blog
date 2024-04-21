<template>
    <BlogHeader />
    <div class="container" v-if="blogData && state === 'show'">
        <h1>{{ blogData.title }}</h1>
        <div class="user">
            <img :src="blogData.profile_picture" alt="Profile Picture" class="profile-picture">
            <div class="author">
                <p class="name">{{ blogData.firstName }}</p>
                <p class="name">{{ blogData.lastName }}</p>
            </div>
            <p class="created">am {{ blogData.published_at }}</p>
        </div>
        <div class="box">
            <p class="description">{{ blogData.description }}</p>
            <img :src="blogData.blog_image" alt="Image">
        </div>
        <creator v-if="blogData.content" :content="blogData.content" :state="state" />
        <div>
            <div v-if="blogData" v-for="comment in blogData?.comments" :key="comment.id">
                <Comment :comment="comment" :isSubComment="false" />
                <div v-if="comment.sub_comments && comment.sub_comments.length > 0">
                    <div v-for="subComment in comment.sub_comments" :key="subComment.id">
                        <Comment :comment="subComment" :isSubComment="true" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container" v-else-if="blogData && state === 'edit'">
        <img :src="blogData.blog_image" alt="Image" @click="handleImageUpload">
        <input type="file" style="display: none;" ref="imageInput" @change="handleFileChange">
        <div class="inputField">
            <h1 v-if="!isEditingTitle" @click="isEditingTitle = true">{{ blogData.title }}</h1>
            <input v-model="blogData.title" v-if="isEditingTitle">
            <button v-if="isEditingTitle" @click="saveTitle">OK</button>
        </div>
        <div class="inputField">
            <p class="description" v-if="!isEditingDescription" @click="isEditingDescription = true">{{
        blogData.description }}</p>
            <textarea v-model="blogData.description" v-if="isEditingDescription"></textarea>
            <button v-if="isEditingDescription" @click="saveDescription">OK</button>
        </div>
        <creator v-if="blogData.content" :content="blogData.content" :state="state" @saved="getJson" />
        <button @click="saveBlog()">saveBlog</button>
    </div>

    <div class="container" v-else-if="state === 'create'">
        <img :src="blogData && blogData.blog_image ? blogData.blog_image : 'http://localhost/storage/blog_images/default.png'"
            @click="handleImageUpload" alt="Image">
        <input type="file" style="display: none;" ref="imageInput" @change="handleFileChange">
        <div class="inputField">
            <h1 v-if="!isEditingTitle" @click="isEditingTitle = true">{{ blogData.title }}</h1>
            <input v-if="isEditingTitle" v-model="blogData.title" placeholder="Geben Sie Ihrem Blog einen Titel">
            <button v-if="isEditingTitle" @click="saveTitle">OK</button>
        </div>
        <div class="inputField">
            <p class="description" v-if="!isEditingDescription" @click="isEditingDescription = true">{{
        blogData.description }}</p>
            <textarea v-if="isEditingDescription" v-model="blogData.description"
                placeholder="Beischreiben Sie Ihren Blog. Die Beschreibung wird in der Vorschau angezeigt."></textarea>
            <button v-if="isEditingDescription" @click="saveDescription">OK</button>
        </div>
        <creator :content="blogData.content" :state="state" @saved="getJson" />
        <button @click="saveBlog()">Save Blog</button>
    </div>

    <div v-else>
        <p>Loading...</p>
    </div>
</template>

<script setup>

import { ref, onBeforeMount, defineProps, getCurrentInstance } from 'vue';
import { useRoute } from 'vue-router';
import axios from 'axios';
import Comment from '../components/Comment.vue';
import BlogHeader from '../components/BlogHeader.vue';

const { state } = defineProps({
    state: String
});
const route = useRoute();
const content = ref('');
const blogData = ref({
    title: '',
    description: '',
    content: []
});
const isEditingTitle = ref(false);
const isEditingDescription = ref(false);
const file = ref(null);
const instance = getCurrentInstance();

const handleImageUpload = () => {
    instance.refs.imageInput.click();
};

const handleFileChange = (event) => {
    const newFile = event.target.files[0];
    if (newFile) {
        file.value = newFile;
        const reader = new FileReader();
        reader.onload = (e) => {
            blogData.value.blog_image = e.target.result;
        };
        reader.readAsDataURL(newFile);
    }
};

const saveTitle = () => {
    isEditingTitle.value = false;
};

const saveDescription = () => {
    isEditingDescription.value = false;
};

// const toggleEditState = () => {
//     isEditingTitle.value = false;
//     isEditingDescription.value = false;
// };

const getJson = (json) => {
    content.value = json;
    console.log(blogData.value.content)
};

const loadBlog = async () => {
    try {
        const response = await axios.get(`/api/blogs/detail/${route.params.id}`);
        blogData.value = response.data;
    } catch (error) {
        console.error('Error loading blog:', error);
        setTimeout(() => {
            loadBlog();
        }, 3000);
    }
};

const saveBlog = async () => {
    try {
        let response;
        const formData = new FormData();

        formData.append('title', blogData.value.title);
        formData.append('description', blogData.value.description);
        formData.append('content', JSON.stringify(blogData.value.content));
        formData.append('image', file.value);

        if (state === 'create') {
            response = await axios.post('/api/blogs/store', formData);
        } else if (state === 'edit') {
            formData.append('id', route.params.id);
            response = await axios.post(`/api/blogs/store/${blogData.value.id}`, formData);
        }

        console.log('Blog post saved:', response.data);
    } catch (error) {
        console.error('Error saving blog post:', error);
    }
};


onBeforeMount(() => {
    if (state !== 'create') {
        loadBlog();
    }
    else {
        isEditingTitle.value = ref(true);
        isEditingDescription.value = ref(true);
    }

});

</script>

<style lang="scss">

.container {
    margin: 175px;

    & .box {
        display: flex;
        flex-direction: row;
        align-items: center;

        & img {
            height: 300px;
            max-width: 50%;
            margin: auto;
        }

        & .description {
            width: 50%;
        }
    }
}

h1 {
    font-size: 40px;
}

p {
    font-size: 16px;
}

.description {
    font-size: 20px;
}

input,
textarea {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;

}

.inputField {
    display: flex;
    flex-direction: row;
}


button {
    background-color: #ffffff;
    border: 2px solid #000000;
    border-radius: 10px;
    color: #000;
    padding: 7px 16px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
}

button {
    transition-duration: 0.4s;
}

button:hover {
    background-color: #000000;
    color: white;
}

.user {
    font-size: 12px;
    padding: 5px 20px;

    & img {
        width: 30px;
        height: 30px;
        border-radius: 50%;
        margin: auto;
    }

    & .author {
        @include flex(row);
        padding: 0 10px;
    }
}
</style>