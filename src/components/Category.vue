<script>
export default {
    props: {
        imgSrc: String,
        quantity: Number, 
        label: String,
        bgColor: String,
    }
}
</script>

<template>
  <div class="container">
      <img :src="imgSrc" alt="" height="120px" width="120px">
      <div class="label quicksand-regular">{{ label || "Unknown" }}</div>
      <div class="quantity lato-regular" v-if="quantity" >{{ quantity===1 ? quantity + " Item" : quantity + " Items" }}</div>
      <div class="quantity lato-regular" v-else >0 Items</div>
  </div>
</template>

<style scoped>
  .container {
    color: red;
    background-color: v-bind(bgColor);
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 136px;
    height: 185px;
    border-radius: 10px;
    margin: 10px;
  }

  .container .label {
    font-size: 16px;
    color: #253D4E;
  }

  .container .quantity {
    font-size: 8px;
    color: #B6B6B6;
  }

</style>