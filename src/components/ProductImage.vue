<template>
    <div class="image-container">
        <div class="image-head" >
            <img :src="'http://localhost:3000/' + imgArray[imgIndex]" width="420px" height="600px" alt="">
        </div>
        <div class="image-children">
            <div class="button" @click="prevImg"> &lt; </div>
            
            <template v-for="(image, index) in imgArray" :key="index">
                <div class="img-wrapper" 
                :class="{'img-active': index===imgIndex}"
                @click="setActiveImg(image, index)"
                >
                    <img :src="'http://localhost:3000/' + image" alt="">
                </div>
            </template>
            <div class="button next-button" @click="nextImg"> &gt; </div>
        </div>
    </div>
    </template>
    <script>
    export default {
        props: {
            imgArray: Array,
        },
        data() {
            return {
                imgIndex: 0,
            }
        },
        methods: {
            setActiveImg(img, index) {
                this.imgIndex = index;
            },
            nextImg() {
                this.imgIndex = (this.imgIndex + 1) % this.imgArray.length 
            },
            prevImg() {
                this.imgIndex = this.imgIndex === 0 ? this.imgArray.length - 1 : this.imgIndex - 1;
            }
        }
    }
    </script>
    <style scoped>
    .image-container {
        width: 50%;
        height: 700px;
        display: flex;
        flex-direction: column;
        border: 1px solid #E5E5E5;
        border-radius: 15px;
        box-sizing: border-box;
        padding: 0 8px;
    }
    .image-head {
        display: flex;
        justify-content: center;
        padding: 20px;
        box-sizing: border-box;
        width: 100%;
        height: 500px;
    }
    .image-head > img {
        width: 80%;
        height: 80%;
    }
    .image-children {
        display: flex;
        column-gap: 8px;
    }
    .img-wrapper {
        display: flex;  
        justify-content: center;
        align-items: center;
        width: 120px;
        height: 100px;
        border: 1px solid #F2F3F4;
        border-radius: 15px;
        cursor: pointer;
    }
    .img-wrapper > img {
        width: 80%;
        height: 80%;
    }
    .img-active {
        border-color: #3BB77E;
    }
    .button {
        background-color: #3BB77E;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        align-self: center;
        font-size: 24px;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }
    .next-button {
        margin-left: auto;
    }
    </style>