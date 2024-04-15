<script setup>
import { ref, defineProps, computed } from "vue";
const props = defineProps({
    content: Object,
});

const blogContent = ref([]);
const inputType = ref("");

const hasOpenInputFields = computed(() => {
    blogContent.value = props.content;
    return blogContent.value.some((item) => item.visible);
});

function addInput(type) {
    blogContent.value.push({
        type: "input",
        subtype: type,
        value: "",
        visible: true,
    });
    inputType.value = type;
}
function hideInputField(i) {
    const type = blogContent.value[i].subtype;
    blogContent.value[i] = {
        type: type,
        value: blogContent.value[i].value,
    };
    inputType.value = "";
}
function deleteInputField(i) {
    blogContent.value.splice(i, 1);
}
function editInput(i, value) {
    const subtype = blogContent.value[i].type;
    blogContent.value[i] = {
        type: "input",
        subtype: subtype,
        value: value,
        visible: true,
    };
}
function saveBlogContent() {
    const json = JSON.stringify(blogContent.value);
    console.log(json);
    // this.$emit("saved", json);
}
function moveUp(i) {
    const temp = blogContent.value[i];
    blogContent.value[i] = blogContent.value[i - 1];
    blogContent.value[i - 1] = temp;
}
function moveDown(i) {
    const temp = blogContent.value[i];
    blogContent.value[i] = blogContent.value[i + 1];
    blogContent.value[i + 1] = temp;
}
</script>

<template>
    <div>
        <template v-for="(item, i) in blogContent" :key="i">
            <h1></h1>
            <h2
                v-if="item.type === 'subheader'"
                @click="editInput(i, item.value)"
            >
                {{ item.value }}
            </h2>
            <p
                v-else-if="item.type === 'paragraph'"
                @click="editInput(i, item.value)"
            >
                {{ item.value }}
            </p>
            <div v-else-if="item.type === 'input'">
                <textarea
                    v-model="item.value"
                    type="textarea"
                    :placeholder="'Dein Text...'"
                    :rows="5"
                    v-if="item.visible"
                ></textarea>
                <div class="input">
                    <button v-if="item.visible" @click="hideInputField(i)">
                        OK
                    </button>
                    <button v-if="item.visible" @click="deleteInputField(i)">
                        Löschen
                    </button>
                    <button v-if="i > 0 && item.visible" @click="moveUp(i)">
                        Nach oben
                    </button>
                    <button
                        v-if="i < blogContent.length - 1 && item.visible"
                        @click="moveDown(i)"
                    >
                        Nach unten
                    </button>
                </div>
            </div>
        </template>
        <div class="button-funktion">
            <button @click="addInput('subheader')">
                Zwischentitel einfügen
            </button>
            <button @click="addInput('paragraph')">Paragraph einfügen</button>
            <button
                v-if="!hasOpenInputFields && blogContent.length > 0"
                @click="$emit('save', content)"
            >
                Speichern
            </button>
        </div>
    </div>
</template>

<style scoped>
textarea {
    max-width: 800px;
    width: 100%;
    font-size: 20px;
}

.input {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}

.button-funktion {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
}
</style>
