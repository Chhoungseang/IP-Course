<script>
export default {
  props: {
    label: { default: "Shop Now" },
    bgColor: { default: "black" },
    leftIcon: "",
    rightIcon: "",
    pWidth: { default: "160px"},
    pHeigth: { default: "40px" },
    pType: { default: 0 },
  },

  data() {
      return {
        data: [
          {
            width: "160px",
          },
          {
            width: "200px",
          }
        ],
        type: this.pType || 0
      }
    },
    computed: {
      btnObj() {
        if(this.type === 0) {
          return this.data[0]
        } else {
          return this.data[1]
        }
      }
    }
}
</script>

<template>
  <div v-if="pType === 0" class="wrapper">
    <button class="quicksand-regular" >
        <div class="container">
            {{ label }} 
        <svg xmlns="http://www.w3.org/2000/svg" fill="white" width="20px" viewBox="0 0 448 512">><path d="M438.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-160-160c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L338.8 224 32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l306.7 0L233.4 393.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l160-160z"/></svg>    
        </div>        
    </button>
  </div>

  <div v-else class="wrapper">
    <button class="quicksand-regular" >
        <div class="container">
          <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
              <g clip-path="url(#clip0_1579_709)">
              <path d="M8.02297 7.85042H0.689636V2.51709C0.689636 1.98666 0.90035 1.47795 1.27542 1.10288C1.6505 0.727804 2.1592 0.51709 2.68964 0.51709L8.02297 0.51709V7.85042ZM2.02297 6.51709H6.68964V1.85042H2.68964C2.51283 1.85042 2.34326 1.92066 2.21823 2.04569C2.09321 2.17071 2.02297 2.34028 2.02297 2.51709V6.51709Z" fill="white"/>
              <path d="M16.6897 7.85042H9.35632V0.51709H14.6897C15.2201 0.51709 15.7288 0.727804 16.1039 1.10288C16.4789 1.47795 16.6897 1.98666 16.6897 2.51709V7.85042ZM10.6897 6.51709H15.3563V2.51709C15.3563 2.34028 15.2861 2.17071 15.1611 2.04569C15.036 1.92066 14.8665 1.85042 14.6897 1.85042H10.6897V6.51709Z" fill="white"/>
              <path d="M8.02297 16.517H2.68964C2.1592 16.517 1.6505 16.3063 1.27542 15.9313C0.90035 15.5562 0.689636 15.0475 0.689636 14.517L0.689636 9.18372H8.02297V16.517ZM2.02297 10.517V14.517C2.02297 14.6939 2.09321 14.8634 2.21823 14.9885C2.34326 15.1135 2.51283 15.1837 2.68964 15.1837H6.68964V10.517H2.02297Z" fill="white"/>
              <path d="M14.6897 16.517H9.35632V9.18372H16.6897V14.517C16.6897 15.0475 16.4789 15.5562 16.1039 15.9313C15.7288 16.3063 15.2201 16.517 14.6897 16.517ZM10.6897 15.1837H14.6897C14.8665 15.1837 15.036 15.1135 15.1611 14.9885C15.2861 14.8634 15.3563 14.6939 15.3563 14.517V10.517H10.6897V15.1837Z" fill="white"/>
              </g>
              <defs>
              <clipPath id="clip0_1579_709">
              <rect width="16" height="16" fill="white" transform="translate(0.689636 0.51709)"/>
              </clipPath>
              </defs>
          </svg>
            {{ label }}
            <svg width="30" height="26" viewBox="0 0 30 26" fill="none" xmlns="http://www.w3.org/2000/svg">
             <path d="M15 15.8479C14.8042 15.8482 14.6103 15.807 14.4294 15.7265C14.2485 15.646 14.0842 15.5278 13.9459 15.3788L10 11.1338L11.0541 10L15 14.2442L18.9459 10L20 11.1338L16.0541 15.378C15.9159 15.5272 15.7516 15.6455 15.5707 15.7261C15.3898 15.8068 15.1958 15.8481 15 15.8479Z" fill="white"/>
            </svg>
        </div>        
    </button>
  </div>
</template>

<style scoped>
  /* Quicksand font */
  @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Quicksand:wght@300..700&display=swap");

  button {
    background-color: v-bind(bgColor); 
    width: v-bind("'btnObj.width'"); 
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
    align-items: center;
    column-gap: 8px;
  }

  .wrapper {
    align-items: center;
    justify-content: center;
  }
</style>