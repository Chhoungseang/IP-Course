<template>
    <div class="container">
        <div class="title">{{ label }}</div>
        <div class="page-container">
            <router-link to="/page/1">Page1</router-link>
            <router-link to="/page/2">Page2</router-link>
            <router-link to="/page/3">Page3</router-link>
        </div>
    </div>
</template>

<script>
    export default{
        props: {
            label: {default: "Header"}
        }
    }
</script>

<style scoped>
    .page-container{
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        align-items: center;
        /* margin-right: 20px; */
    }
    .container{
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
    }
    .pager{
        margin-left: 10px;
        margin-right: 10px;
        /* border: none;
        background-color: white; */
    }
</style>