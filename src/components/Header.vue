<template>
    <div class="header">
        <img class="bg" src="@/assets/image/Background.png" alt="">
        <p class="quicksand-regular title">{{ category || 'hello' }}</p>
        <p class="lato-regular bread">Home &gt; Categories &gt; {{ category || 'hello' }}</p>
    </div>
</template>
<script>
export default {
    props: {
        category: String
    }
}
</script>
<style scoped>
p {
    margin: 0;
    padding: 0;    
}
.bg {
    position: absolute;
    top: 0;
    left: 0;
}
.header {
    background: #d8f1e5;
    padding: 40px;
    border-radius: 15px;
    position: relative;
    height: 230px;
    overflow: hidden;
}
.title {
    font-size: 48px;
    font-weight: 700;
    color: #253D4E;
}
.bread {
    color: #7e7e7e;
    font-size: 18px;
    word-spacing: 10px;
}
</style>