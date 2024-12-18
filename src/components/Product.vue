<template>
    <div class="container">
      <div v-show="checkPromoStatus" class="promotion-status">
        <p class="lato-regular">{{ showPromoStatus }}</p>
      </div>
      <img :src="imgPath" alt="" @click="$emit('img-clicked')">
      <div class="card-title">
        <p class="lato-regular gray">Hodo Foods</p>
          <h4 class="quicksand-regular label">
            {{ 
              productName || "Seeds of Change Organic Quinoa, Brown, & Red Rice" 
            }}
          </h4>  
        
        <div class="rating">
          <template v-for="n in rating">
              <svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 24 24" fill="#FDC040"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path></svg>
          </template>
          <template v-for="n in 5-rating">
              <svg xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 24 24" fill="#CDCDCD"><path d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z"></path></svg>
          </template>
          <p class="lato-regular gray">{{ `(${rating}.0)` }}</p>
        </div>
        <p class="lato-regular gray">500 grams</p>
        <div class="card-price">
          <div>
            <template v-if="discountPercent > 0" >
            <h2 class="quicksand-regular price-color">{{`$${discountedPrice}`}}</h2>
            <p class="quicksand-regular"><del>{{ `$${price}` }}</del></p>
            </template>
            <h2 v-else class="quicksand-regular price-color">{{`$${price}`}}</h2>
          </div>
          <div class="add-button">
            <button @click="btnAddProduct" v-if="!addedClicked" >Add <span>+</span></button>
            <input v-else type="number" name="" id="" min="0" max="999" value="0"  v-model="amount">
          </div>
        </div>
          
      </div>
        
    </div>
    </template>
    <script>
    import useProductStore from '@/stores/product';
    import { mapState } from 'pinia';
    export default {
      props: {
        productId: Number,
        promoLabel: {
          type: String,
          default: "hello"
        },
        productName: {
          type: String,
          default: "Bocchi"
        },
        price: 0,
        discountPercent: 0,
        imgPath: "",
        rating: 0,
        countSold: 0,
        instock: 0,
      },
      data() {
          return {
            addedClicked: false,
            amount: 0,
            promoColor: "#000000",
            promoActive: true,
            promoType: String,
          }
      },
      computed: {    
        showPromoStatus() {
          if(this.promoType === 'discount') {
            this.promoColor = "#3BB77E"
            return "-%" + this.discountPercent
          }
          else if(this.promoType === 'hot') {
            this.promoColor  = "#FD6E6E"
            return "Hot"
          }
          else if(this.promoType === 'sale') {
            this.promoColor  = "#F6C851"
            return "Sale"
          } 
        },
        ...mapState(useProductStore, {
        countProductAdded: "countProductAdded"
        }),
        discountedPrice() {
          const discounted = this.price * (1 - this.discountPercent / 100) 
          return discounted.toFixed(2)
        },
        checkPromoStatus() {
          let discount = false
          let sale = false
          let hot = false
          if(this.discountPercent > 0) {
            this.promoType = "discount"
            discount = true
          }
          
          if(this.instock > 100) {
            this.promoType = "sale"
            sale = true
          }
          if(this.countSold > 10) {
            this.promoType = "hot"
            hot = true
          } 
          if( !(hot || sale || discount)) {
            return false
          }
          
          return true
        },
      },
      methods: {
        btnAddProduct() {
          this.amount = 1;
          this.addedClicked = true;
        },
        
      },
      
      watch: {
        amount(curr) {
          if(this.productId) {
            this.countProductAdded[this.productId] = curr;
          }
          console.log(`${this.productId}: ${this.countProductAdded[this.productId]}`)
          if(curr === 0) {
            this.addedClicked = false
          }
        },
      }, 
    }
    </script>
    <style scoped>
      .card-title {
        display: flex;
        flex-direction: column;
        row-gap: 8px;
      }
      .card-title > * {
        margin: 0
      }
      .card-title > p {
        font-size: 12px;
      }
      .card-title .label {
        height: 46px;
      }
      .text-brand {
        color: #7E7E7E;
      }
      .container {
        width: 300px;
        height: 420px;
        display: flex;
        flex-direction: column;
        border: 1px solid #BCE3C9;
        padding: 20px;
        box-sizing: border-box;
        border-radius: 10px;
        box-shadow: 20px 20px 40px #18181812;
        position: relative;
        cursor: pointer;
      }
      img {              
        width: 200px;
        height: 140px;
        align-self: center;
        padding-bottom: 12px;
        margin-top: 40px;
        cursor: pointer;
      }
      .rating {
        display: flex;
        height: 24px;
        align-items: center;
      }
      .rating > p {
        font-size: 12px;
      }
      .gray {
        color:#7E7E7E
      }
      .card-price {
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: row;
        justify-content: space-between;
        align-items: center;
        height: 36px;
      }
      .card-price > div {
        display: flex;
        align-items: baseline;
        column-gap: 12px;
      }
      .card-price h2 {
        font-size: 24px;
        color: #3BB77E;
      }
      .card-price p {
        font-size: 12px;
        color: #7E7E7E;
      }
      .add-button > * {
        width: 70px;
        font-size: 14px;
        color: #3BB77E;
        font-weight: 700;
        border-radius: 4px;
        cursor: pointer;
      }
      .add-button > button {
        height: 32.5px;
        background-color: #DEF9EC;
        border: none;
        text-align: center;
      }
      .add-button > input {
        height: 30px;
        background-color: white;
        border: 1px solid #3BB77E;
        text-align: center;
      }
      .add-button span {
        font-size: 20px;
      }
      .promotion-status {
        background: v-bind(promoColor);
        position: absolute;
        left: 0px;
        text-align: center;
        width: 80px;
        border-radius: 0 30px 30px 0;
      }
      .promotion-status > p {
        color: white;
        font-size: 12px;
        font-weight: 400;
      }
      
    </style>