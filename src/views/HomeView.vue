<template>
  <Header />
  <div class="body">
        <div class="menuSec">
            <span class="menu">Menu</span>
            <section class="section">
                <template v-for="(section, index) in menuSections" :key="index">
                    <RouterLink :to="`/page/${$route.params.pageNumber}` + section.link">
                        {{ section.name }}  
                    </RouterLink> 
                </template>
            </section>
        </div>
        <div class="article">
            <RouterView />
            <div class="Input">
                <p>Message:</p>
                <input type="text" v-model="store.message">
            </div>
        </div>  
    </div>
  <Footer />
</template>

<script>
import Footer from '@/components/Footer.vue';
import Header from '@/components/Header.vue';
import { useMessageStore } from '@/stores/Info';

export default{
  components: {
    Header,
    Footer,
  },
  setup() {
        const store = useMessageStore()
        return {
            store,
        }
    },
    data() {
        return {
            menuSections: [
                { name: "Section 1", link: "/section/1"},
                { name: "Section 2", link: "/section/2"},
                { name: "Section 3", link: "/section/3"},
                { name: "Section 4", link: "/section/4"},
            ],
        }
    },
}
</script>

<style scoped>
.body {
  display: flex;
  justify-content:space-between;
  align-items: center;
  border: 1px solid black;
}
.menuSec {
  display: flex;
  flex-direction: column;
  width: 20%;
  border: 1px solid black;
  border-left: none;
  border-top: none;
  border-bottom: none;
}
.menu {
  display: flex;
  justify-content: center;
  text-decoration: none;
  color: black;
  padding: 30px;
  border: 1px solid black;
}
.section {
  display: flex;
  flex-direction: column;
  justify-content: center;
}
.section a {
  display: flex;
  justify-content: center;
  text-decoration: none;
  color: black;
  padding: 30px;
  border: 1px solid black;
}
.article {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 100%;
}
.space {
  display: flex;
  align-items: center;
  justify-content: center;
  height: 20vh;
}
.Input {
  display: flex;
  gap: 20px;
  align-items: center;
}
.Input > input {
  padding: 10px;
  height: 20px;
  background-color: transparent;
}
</style>