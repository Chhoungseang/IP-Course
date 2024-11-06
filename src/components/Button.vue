<script>
export default {
    props: {
        bgColor: String,
    }
}
</script>

<template>
    <button class="quicksand-regular" >
        <div class="container">
            Shop Now 
        <svg xmlns="http://www.w3.org/2000/svg" fill="white" width="20px" viewBox="0 0 448 512">><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>    
        </div>        
    </button>
</template>

<style scoped>
  /* Quicksand font */
  @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Quicksand:wght@300..700&display=swap");

  button {
    background-color: v-bind(bgColor); 
    width:160px; 
    height:40px;
    padding: 10px;
    border-radius: 4px;
    border: none;
    margin-top: 20px;
    
  }

  .quicksand-regular {
    font-family: "Quicksand", serif;
    font-optical-sizing: auto;
    font-weight: 700;
    font-style: normal;
  }

  .container {
    display: flex;
    flex-direction: row;
    color: white;
    justify-content: space-around;
  }

</style>