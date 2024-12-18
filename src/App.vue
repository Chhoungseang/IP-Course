<template>
  <Navigation />
  <router-view />
</template>

<script>
import Navigation from './components/Navigation.vue';
import { useProductStore } from './stores/product';
export default {
  setup() {
    const store = useProductStore();
    return {
      store,
    }
  },
  components: {
     Navigation,
  },
  async mounted() {
      await this.store.fetchCategories()
      await this.store.fetchPromotions()  
      await this.store.fetchProducts()
      await this.store.fetchGroups()
    }, 
}
</script>