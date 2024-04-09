<template>
    <div>
        <template v-for="(item, i) in blogContent" :key="i">
            <h2 v-if="item.type === 'subheader'" @click="editInput(i, item.value)">{{ item.value }}</h2>
            <p v-else-if="item.type === 'paragraph'" @click="editInput(i, item.value)">{{ item.value }}</p>
            <div v-else-if="item.type === 'input'">
                <input v-model="item.value" type="textarea" :placeholder="'Dein Text...'" v-if="item.visible">
                <button v-if="item.visible" @click="hideInputField(i)">OK</button>
                <button v-if="item.visible" @click="deleteInputField(i)">Löschen</button>
                <button v-if="i > 0 && item.visible" @click="moveUp(i)">Nach oben</button>
                <button v-if="i < blogContent.length - 1 && item.visible" @click="moveDown(i)">Nach unten</button>
            </div>
        </template>
        <div>
            <button @click="addInput('subheader')">Zwischentitel einfügen</button>
            <button @click="addInput('paragraph')">Paragraph einfügen</button>
            <button v-if="!hasOpenInputFields && blogContent.length > 0" @click="saveBlogContent">Speichern</button>
        </div>
    </div>
</template>

<script >


export default {
    props: {
        content: {}
    },
    data() {
        return {
            blogContent: [
            { type: 'subheader', value: 'Test' },
            { type: 'paragraph', value: 'Beispiel-Text' }
        ],
            inputType: '',
            
        };
    },
    computed: {
        hasOpenInputFields() {
            this.blogContent= this.content?this.content:this.blog.content;
            return this.blogContent.some(item => item.visible);
        }
    },
    
    methods: {
        addInput(type) {
            this.blogContent.push({ type: 'input', subtype: type, value: '', visible: true });
            this.inputType = type;
        },
        hideInputField(i) {
            const type = this.blogContent[i].subtype;
            this.blogContent[i] = { type: type, value: this.blogContent[i].value };
            this.inputType = '';
        },
        deleteInputField(i) {
            this.blogContent.splice(i, 1);
        },
        editInput(i, value) {
            const subtype = this.blogContent[i].type;
            this.blogContent[i] = { type: 'input', subtype: subtype, value: value, visible: true };
        },
        saveBlogContent() {
            const json = JSON.stringify(this.blogContent);
            this.$emit('saved', json);
        },
        moveUp(i) {
            const temp = this.blogContent[i];
            this.blogContent[i] = this.blogContent[i - 1];
            this.blogContent[i - 1] = temp;
        },
        moveDown(i) {
            const temp = this.blogContent[i];
            this.blogContent[i] = this.blogContent[i + 1];
            this.blogContent[i + 1] = temp;
        },
        
    }
};
// export const convertToHtml = (content) => {
//     let html = '';
//     content.forEach(item => {
//         if (item.type === 'subheader') {
//             html += <h2>${item.value}</h2>;
//         } else if (item.type === 'paragraph') {
//             html += <p>${item.value}</p>;
//         }
//     });
//     return html;
// };
</script>
