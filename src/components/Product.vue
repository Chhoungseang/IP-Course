<script>
import ShopButton from './Button.vue';

export default {
    components: {
        ShopButton
    },
    props: {
        imgSrc: String,
        label: String,
        bgColor: String,
        buttonColor: String,
    },
    methods: {
      shopnow(promotion){
        alert ("Let's shop: "+promotion);
      }
    }
}
</script>

<template>
  <div class="container">
    <div class="inner-container">
      <div class="label quicksand-regular">
            {{ label }}
      </div>
      <div class="button">
              <ShopButton @click="shopnow(label)" :bgColor="buttonColor"/>
      </div>
    </div>
    <img :src="imgSrc" alt="">
  </div>
</template>


<style scoped>
  /* Quicksand font */
  @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Quicksand:wght@300..700&display=swap");

  .quicksand-regular {
    font-family: "Quicksand", serif;
    font-optical-sizing: auto;
    font-weight: 700;
    font-style: normal;
  }

  .container {
    background-color: v-bind(bgColor);
    display: flex;
    flex-direction: row;
    align-items: center;
    width: 512px;
    height: 300px;
    border-radius: 10px;
    margin: 8px;
  }

  .inner-container {
    width: inherit;
    height: 160px;
    display: flex;
    flex-direction: column;
    align-content: center;
    justify-content: space-between;
    margin-left: 30px;
  }

  .container .label {
    font-size: 28px;
    color: #253D4E;
  }

  .container img {
    width: 240px;
    height: 240px;
    align-self: end;
  }

  .button {
    align-self: self-start;
  }
</style>