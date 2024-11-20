<template>
  <div class="container">
      <template v-for="item in items" key="item">
        <CategoryComponent :label="item.name" 
        :imgSrc="item.image" 
        :quantity="item.productCount"
        :bgColor="item.color"
        />
      </template>
  </div>

  <div class="container">
    <template v-for="item in promotions" key="item">
      <PromotionComponent :label="item.title" :bgColor="item.color" :imgSrc="item.image" :buttonColor="item.buttonColor"/>
    </template>
  </div>
  

</template>

<script >
import axios from 'axios';
import CategoryComponent from './components/Category.vue';
import PromotionComponent from './components/Product.vue';

export default {
  components: {
    CategoryComponent,
    PromotionComponent
  },
  methods: {
    getQuantity() {
      return Math.floor(Math.random() * 100)
    },
    fetchCategories(){
      axios.get('http://127.0.0.1:3000/api/categories').then(result => {
        this.items = result.data;
    })
    .catch(error => {
      console.error('Error fetching data:', error);
    });
    },
    fetchPromotion(){
      axios.get('http://127.0.0.1:3000/api/promotions').then(result => {
        this.promotions = result.data;
    })
    .catch(error => {
      console.error('Error fetching data:', error);
    });
    }
  },
  mounted() {
    this.fetchCategories();
    this.fetchPromotion();
  },
  data() {
    return {
      items: [
        // {
        //   label: 'Burger',
        //   imgSrc: './src/assets/image/Burger.png',
        //   quantity: this.getQuantity(),
        //   bgColor: "#F2FCE4",
        // },
        // {
        //   label: 'Peach',
        //   imgSrc: './src/assets/image/Peach.png',
        //   quantity: this.getQuantity(),
        //   bgColor: '#FFFCEB',
        // },
        // {
        //   label: 'Organic Kiwi',
        //   imgSrc: './src/assets/image/Kiwi.png',
        //   quantity: this.getQuantity(),
        //   bgColor: '#F2FCE4',
        // },
        // {
        //   label: 'Red Apple', 
        //   imgSrc: './src/assets/image/Apple.png' ,
        //   quantity: this.getQuantity(),
        //   bgColor: '#FEEFEA',
        // },
        // {
        //   label: 'Snack' ,
        //   imgSrc: './src/assets/image/Snack.png' ,
        //   quantity: this.getQuantity(),
        //   bgColor: '#FFF3EB',
        // },
        // {
        //   label: 'Black Plum', 
        //   imgSrc: './src/assets/image/Plum.png' ,
        //   quantity: this.getQuantity(),
        //   bgColor: '#FFF3FF',
        // },
        // {
        //   label: 'Vegetables' ,
        //   imgSrc: './src/assets/image/Cabbage.png' ,
        //   quantity: this.getQuantity(),
        //   bgColor: '#F2FCE4',
        // },
        // {
        //   label: 'Headphone' ,
        //   imgSrc: './src/assets/image/Headphone.png' ,
        //   quantity: this.getQuantity(),
        //   bgColor: '#FFFCEB',
        // },
        // {
        //   label: 'Cake & Milk' ,
        //   imgSrc: './src/assets/image/Cake.png' ,
        //   quantity: this.getQuantity(),
        //   bgColor: '#FFF3EB',
        // },
        // {
        //   label: 'Orange', 
        //   imgSrc: './src/assets/image/Orange.png' ,
        //   quantity: this.getQuantity(),
        //   bgColor: '#FFF3FF',
        // },
      ],
      promotions: [
        // {
        //   label: 'Everyday Fresh & Clean with Our Products',
        //   imgSrc: './src/assets/image/Onion.jpg',
        //   bgColor: '#F0E8D5',
        //   buttonColor: '#3BB77E',
        // },
        // {
        //   label: 'Make your Breakfast Healthy and Easy',
        //   imgSrc: './src/assets/image/Milk.png',
        //   bgColor: '#F3E8E8',
        //   buttonColor: '#3BB77E',
        // },
        // {
        //   label: 'The Best Organic Products Online',
        //   imgSrc: './src/assets/image/Veggie.jpg',
        //   bgColor: '#E7EAF3',
        //   buttonColor: '#3BB77E',
        // },
      ]
    }
  }
}
</script>

<style scoped>
.container {
  display: inline-flex;
}

</style>