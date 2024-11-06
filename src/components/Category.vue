<script>
export default {
    props: {
        imgSrc: String,
        quantity: Number, 
        label: String,
        bgColor: String,
        radiusColor: String,
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
  /* Lato font */
  @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap");
  /* Quicksand font */
  @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Quicksand:wght@300..700&display=swap");

  .quicksand-regular {
    font-family: "Quicksand", serif;
    font-optical-sizing: auto;
    font-weight: 700;
    font-style: normal;
  }

  .lato-regular {
    font-family: "Lato", sans-serif;
    font-weight: 400;
    font-style: normal;
  }

  .container {
    color: red;
    background-color: v-bind(bgColor);
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 136px;
    height: 185px;
    border-radius: 10px;
    border: 1px solid v-bind(radiusColor);
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