<template>
    <div class="breads lato-regular">
        <span @click="$router.push('/')">Home</span> 
        &gt; 
        <span @click="$router.push(`/categories/${product.categoryId}`)">{{ categoryById(product.categoryId)[0].name }}</span> 
        &gt; 
        <span class="bread-name">{{ product.name.substr(0,10) }}</span>
    </div>
    <div class="container">
        <div class="product-wrapper">
            <ProductImage :img-array="JSON.parse(product.image)"/>
            <ProductDetail :product="product" :p-amount="countProductAdded[productId]"/>
        </div>
        <div class="bottom-details lato-regular">
            <div class="tabs ">
                <div v-for="(tab, index) in ['Description', 'Additional Info', 'Reviews (3)']" :key="index" 
                @click="changeTab(index)"
                :class="{'tab-active' : tabIndex == index}"
                > 
                    {{ tab }}
                </div>
            </div>
            <div class="tab-content">
                {{ tabContents[tabIndex] }}
            </div>
        </div>
    </div>
    </template>
    <script>
    import ProductDetail from '@/components/ProductDetail.vue';
    import ProductImage from '@/components/ProductImage.vue';
    import { useProductStore } from '@/stores/product';
    import { mapState } from 'pinia';
    export default {
        props: {
            productId: Number,
        },
        components: {
            ProductImage,
            ProductDetail,
        },
        data() {
            return {
                tabContents: [
                    "Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero odit praesentium quaerat error impedit excepturi, enim veniam quo consequuntur a.",
                    "For real, for real this time For real, for real, for real this time madame, I cannot fall short For real, for real, for real this time (yeah yeah) For real, for real, for real this time",
                    "I wanna be the very best Like no one ever was To catch them is my real test To train them is my cause I will travel across the land Searching far and wide Teach Pokémon to understand The power that's inside",
                ],
                tabIndex: 0,
            }
        },
        methods: {
            changeTab(index) {
                this.tabIndex = index
            }
        },
        computed: {
            ...mapState(useProductStore, {
                products: "products",
                categories: "categories",
                countProductAdded: "countProductAdded",
                categoryById(store) {
                    return store.getCategoryById;
                }
            }),
            product() {
                return this.products[this.productId-1];
            }
        }
    }
    </script>
    <style scoped>
    .breads {
        margin: 12px 4px;
        word-spacing: 4px;
        font-size: 20px;
    }
    .breads span {
        cursor: pointer;
    }
    .breads .bread-name {
        color: #3BB77E;
    }
    .container {
        display: flex;
        flex-direction: column;
    }
    .product-wrapper {
        display: flex;
        column-gap: 40px;
    }
    .bottom-details {
        box-sizing: border-box;
        margin-top: 20px;
        padding: 40px;
        border: 1px solid #b3b3b3;
        border-radius: 15px;
    }
    .tabs {
        display: flex;
        column-gap: 40px;
        font-size: 24px;
        color: #B6B6B6;
    }
    .tab-active {
        color: #3BB77E;
        border-color: #3BB77E;
    }
    .tabs > div {
        padding: 15px 30px;
        border: 1px solid #b3b3b3;
        border-radius: 30px;
        cursor: pointer;
    }
    .tab-content {
        margin-top: 40px;
    }
    </style>