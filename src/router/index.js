import HomeView from '@/views/HomeView.vue'
import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: "home",
      component: HomeView,
    },

    {
      path: "/categories/:categoryId",
      name: "category",
      component: () => import("@/views/CategoryView.vue"),
      props: true,
    },

    {
      path: "/products/:productId",
      name: "product",
      component: () => import("@/views/ProductView.vue"),
      props: true,
    }
  ]
})

export default router
