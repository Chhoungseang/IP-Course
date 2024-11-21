import { defineStore } from 'pinia'
import axios from "axios"
export const useProductStore = defineStore('product', {
    state: () => ({
         groups: [],
         promotions: [],
         categories: [],
         products: []
    }),
    getters: {
     getCategoriesByGroup(groupName) {
          return (groupName) => this.categories.find((category) => category.group === groupName)
     },
     getProductsByGroup(groupName) {
          return (groupName) => this.products.find((product) => product.group === groupName)
     },
     getProductsByCategory(categoryId) {
          return (categoryId) => this.products.find((product) => product.categoryId === categoryId)
     },
     getPopularProducts() {
          const countPopular = 10;
          const popular = () => this.products.find((product) => product.countSold > countPopular)
          return popular
     },
    },
    actions: {
     async fetchCategories() {
          await axios.get("http://localhost:3000/api/categories").then(res => {
            this.categories = res.data;
            
          })
     },
     async fetchPromotions() {
          await axios.get("http://localhost:3000/api/promotions").then(res => {
          this.promotions = res.data;
     })
     },
     async fetchProducts() {
          await axios.get("http://localhost:3000/api/products").then(res => {
          this.products = res.data;
     })
     },
     async fetchGroups() {
          await axios.get("http://localhost:3000/api/groups").then(res => {
          this.groups = res.data;
     })
     }
    },
  })

  export default useProductStore;