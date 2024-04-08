<script setup></script>
<template>

    <header>
        <div id="header">
            <div class="left"> a</div>
            <div class="right">b</div>
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
    background-image: linear-gradient(135DEG , rgb(222,7,241), rgb(5,5,5));
    border: solid red 1px;
}
.left{
    width: 50vw;
    height: 63px;
}
.right{
    width: 50vw; 
    height: 63px; 
};


</style>