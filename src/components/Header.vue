<template>
    <div class="container">
        <div class="title">Header</div>
        <div class="page-container">
            <router-link to="/page/1" class="linker1">Page1</router-link>
            <router-link to="/page/2" class="linker1">Page2</router-link>
            <router-link to="/page/3" class="linker1">Page3</router-link>
        </div>
    </div>
</template>

<!-- <script>
    export default{
        props: {
            label: {default: "Header"}
        }
    }
</script> -->

<style scoped>
    .page-container{
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        align-items: center;
        width: 250px;
        /* margin-right: 20px; */
    }
    .container{
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        border: 3px solid black;
        height: 50px;
    }
    .pager{
        margin-left: 10px;
        margin-right: 10px;
        /* border: none;
        background-color: white; */
    }
    .linker1{
        color: black;
    }
    .linker1:hover{
        color: red;
    }
</style>