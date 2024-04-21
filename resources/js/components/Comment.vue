<template>
    <div class="container" :class="{ 'sub-comment': isSubComment }">
        <div class="user">
            <img :src="comment.profile_picture" alt="Profile Picture" class="profile-picture">
            <div class="author">
                <p class="name">{{ comment.firstName }}</p>
                <p class="name">{{ comment.lastName }}</p>
            </div>
            <p class="created">am {{ comment.created_at }}</p>
        </div>
        <div class="line"></div>
        <div class="content">
            <p class="text">{{ comment.content }}</p>
        </div>
    </div>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    comment: {
        type: Object,
        required: true,        
    }
});

const isSubComment = !!props.comment.parent_id;
</script>

<style lang="scss" scoped>
@mixin flex($direction) {
    display: flex;
    flex-direction: $direction;
    align-items: start;
}

.container {
    @include flex(column);
    border: 3px solid black;
    border-radius: 15px;
    margin: 10px 50px;

    &[isSubComment="true"]{
        margin-left: 30px;
    }
    & .user {
        @include flex(row);
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
     & .line {
        width: 100%;
        border-bottom: 3px solid black;
     }

     & .content{
        font-size: 14px;
        padding: 20px;
     }
}
</style>