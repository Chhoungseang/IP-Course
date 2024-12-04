<template>
   <Menu
    :title="'Featured Products'"
    :navList="groups"/>
  <div class="container">
      <template v-for="item in categories" key="item">
        <CategoryComponent :label="item.name" 
        :imgSrc="item.image" 
        :quantity="item.productCount"
        :bgColor="item.color"
        />
      </template>
  </div>

  <div class="container">
    <template v-for="item in promotions" key="item">
      <PromotionComponent :label="item.title" :bgColor="item.color" :imgSrc="item.image" :buttonColor="item.buttonColor" :price="item.price"/>
    </template>
  </div>
  
  <br>
  <Menu
  :title="'Popular Products'"
  :navList="groups"
  @change-nav="changeProductGroup"
  />
  <div class="product-list">
    <template v-for="item in products" key="item">
      <Product
      :productName="item.name"
      :imgPath="item.image"
      :rating="item.rating"
      :discountPercent="item.promotionAsPercentage"
      :price="item.price"
      :countSold="item.countSold"
      :instock="item.instock"
      />
    </template>
  </div>

</template>

<script >
import axios from 'axios';
import CategoryComponent from './components/Category.vue';
import PromotionComponent from './components/Promotion.vue';
import Product from './components/Product.vue';
import Menu from './components/Menu.vue';
import { useProductStore } from './stores/product.js';
import { mapState } from 'pinia';

export default {
  setup() {
  const store = useProductStore()
  return {
  store
  }
  },
  components: {
    CategoryComponent,
    PromotionComponent,
    PromotionComponent,
    Product,
    Menu
  },
  methods: {
    getQuantity() {
      return Math.floor(Math.random() * 100)
    },
    changeProductGroup(nav) {
      this.store.currProductGroup = nav
    },
  },
  computed: {
    ...mapState(useProductStore, {
      categories: "categories",
      promotions: "promotions",
      products: "products",
      groups: "groups",
      categories: "categories",

      meatProducts(store) { 
        return store.getMeatProducts
      },

      // categories(store) {
      //   return store.getCategoriesByGroup(this.currentGroupName)
      // },
      
      popularProducts(store) {
        return store.getPopularProducts()
      },

      productByGroup(store) {
        return store.getProductsByGroup(this.currentGroupName)

      }
    }),
  },
  async mounted() {
    await this.store.fetchCategories()
    await this.store.fetchPromotions()
    await this.store.fetchProducts()
    await this.store.fetchGroups()
  }, 
  data() {
    return {
      currentGroupName: "Vegetables",
      currCategoryGroup: "All",
      currProductGroup: "All",
    }
  }
}
</script>

<style scoped>
.container {
  display: inline-flex;
}

.product-list {
  margin: 10px;
  display: grid;
  grid-template-rows: repeat(2, 424px);
  grid-template-columns: repeat(5, 300px);
  gap: 18px;
}

</style>