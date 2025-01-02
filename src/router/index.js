import HomeView from "@/views/HomeView.vue"
import Page from "@/views/Page.vue"
import Section from "@/views/Section.vue";
import { createRouter, createWebHistory } from "vue-router"

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      redirect:"",
      component: HomeView,
      children: [
        {
          path: "page/:pageNumber",
          component: Page,
          children: [
            {
              path: "section/:secNumber",
              component: Section,
            }
          ]
        },
      ],
    },
  ],
});

export default router;
