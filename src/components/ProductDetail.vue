<template>
    <div class="detail-container">
        <p class="title quicksand-regular">
            {{ product.name }}
        </p>
        <div class="ratings">
            <div class="stars">
                <template v-for="n in product.rating">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 24 24" fill="#FDC040"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path></svg>
                </template>
                <template v-for="n in 5-product.rating">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 24 24" fill="#CDCDCD"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path></svg>
                 </template>
            </div>
            <div class="lato-regular number">{{`(${product.rating})`}}</div>
        </div>
        <div v-if="product.promotionAsPercentage && product.promotionAsPercentage > 0" 
            class="quicksand-regular price-wrapper"
        >
            <p class="discounted">${{ discountedPrice(product.price, product.promotionAsPercentage) }} </p>
            <p class="original"><strike>${{ product.price }}</strike></p>
        </div>
        <div v-else
            class="quicksand-regular price-wrapper"
        >
            <p class="discounted">${{ product.price }}</p>
        </div>
        <div class="description lato-regular">
            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Distinctio, est minima. Laboriosam culpa, illo maiores numquam ratione iure nam ipsa, voluptatum ullam facere sint! Voluptate enim soluta iusto fuga sapiente omnis laudantium cupiditate dolor eum obcaecati, sunt reprehenderit, nemo ratione.
        </div>
        <div class="btn-wrapper">
            <div class="add-button">
                <button @click="btnAddProduct" v-if="!addedClicked" >Add <span>+</span></button>
                <input v-else type="number" name="" id="" min="0" max="999" value="0"  v-model="amount">
            </div>
            <div class="add-button to-cart">
                <Cart class="cart-svg"/>
                <button> Add to Cart</button>
            </div>
            <div class="generic-btn heart"><Heart/></div>
            <div class="generic-btn shuffle">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"><path d="M18 17.8832V16L23 19L18 22V19.9095C14.9224 19.4698 12.2513 17.4584 11.0029 14.5453L11 14.5386L10.9971 14.5453C9.57893 17.8544 6.32508 20 2.72483 20H2V18H2.72483C5.52503 18 8.05579 16.3312 9.15885 13.7574L9.91203 12L9.15885 10.2426C8.05579 7.66878 5.52503 6 2.72483 6H2V4H2.72483C6.32508 4 9.57893 6.14557 10.9971 9.45473L11 9.46141L11.0029 9.45473C12.2513 6.5416 14.9224 4.53022 18 4.09051V2L23 5L18 8V6.11684C15.7266 6.53763 13.7737 8.0667 12.8412 10.2426L12.088 12L12.8412 13.7574C13.7737 15.9333 15.7266 17.4624 18 17.8832Z"></path></svg>   
            </div>
        </div>
        
        <div class="vendor-container lato-regular">
            <p class="vendor">Vendor: &ensp; &ensp;<span> John</span></p>
            <p class="vendor">SKU: &ensp; &ensp;<span> FWM15VKT</span></p>
        </div>  
    </div>
    </template>
    <script>
    import Cart from '@/assets/svg/icons/Cart.vue';
    import Heart from '@/assets/svg/icons/Heart.vue';
    import { useProductStore } from '@/stores/product';
    import { mapState } from 'pinia';
    export default {
        props: {
            product: Object,
            pAmount: Number,
        },
        data() {
            return {
                addedClicked : (this.pAmount && true) || false,
                amount: this.pAmount || 0,
            }
        },
        components: {
            Cart,
            Heart,
        },
        methods: {
            btnAddProduct() {
                this.amount = 1;
                this.addedClicked = true;
            },
            discountedPrice(price, percentage) {
                const discounted = price * (1 - percentage / 100) 
                return discounted.toFixed(2)
            },
        },
        computed: {
        ...mapState(useProductStore, {
            countProductAdded: "countProductAdded",
        }),
        },
        
        watch: {
            amount(curr) {
                if(curr === 0) {
                    this.addedClicked = false
                }
            },
        }, 
    }
    </script>
    <style scoped>
    p {
        margin: 0;
        padding: 0;
    }
    .detail-container {
        width: 45%;
        height: 800px;
        display: flex;
        flex-direction: column;
        row-gap: 20px;
    }
    .title {
        font-size: 40px;
        color: #253D4E;
    }
    .ratings {
        display: flex;
        column-gap: 4px;
        align-items: flex-start;
    }
    .ratings > .number {
        font-size: 20px;
        color: #7E7E7E;
    }
    .price-wrapper {
        display: flex;
        column-gap: 50px;
        align-items: baseline;
    }
    .price-wrapper > .discounted {
        color: #3BB77E;
        font-size: 60px;
    }
    .price-wrapper > .original {
        color: #7e7e7e;
        font-size: 32px;
    }
    .description {
        font-size: 18px;
        color: #7e7e7e;
    }
    .add-button > * {
        width: 110px;
        font-size: 20px;
        color: #3BB77E;
        font-weight: 700;
        border-radius: 4px;
        cursor: pointer;
      }
    .add-button > button {
        height: 50px;
        background-color: #DEF9EC;
        border: none;
        text-align: center;
    }
    .add-button > input {
        height: 50px;
        background-color: white;
        border: 1px solid #3BB77E;
        text-align: center;
    }
    .add-button span {
        font-size: 20px;
    }
    .btn-wrapper {
        display: flex;
        column-gap: 12px;
        box-sizing: border-box;
    }
    .to-cart {
        position: relative;
        cursor: pointer;
        display: flex;
        align-items: center;
        background-color: #3BB77E;
        border-radius: 5px;
    }
    .to-cart > button {
        width: 130px;
        color: white;
        background: none;    
        padding: 0;
        margin: 0;
    }
    .cart-svg {
        width: 12%;
        margin-left: 10px;
        color: white;
    }
    .generic-btn > svg {
        width: 50%;
    }
    .generic-btn {
        width: 50px;
        border: 1px solid #F2F3F4 ;
        border-radius: 5px;
        color: #B6B6B6;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .generic-btn > svg {
        color: #B6B6B6;
    }
    .vendor-container {
        margin-top: 20%;
    }
    .vendor-container span {
        color: #7e7e7e;
    }
    </style>