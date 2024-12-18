<template>
<div class="menu">
    <h1 class="quicksand-regular">{{ title }}</h1>
    <div class="navs">
        <template v-for="nav in coolList">
            <p @click.prevent="setCurrNav(nav)" :class="[activeTab === nav ? 'lato-bold' : 'lato-regular']">
                {{nav}}
            </p>
        </template>
    </div>
</div>

</template>

<script>
import { useProductStore } from '@/stores/product';

export default {
    setup() {
        const store = useProductStore()

        return {
            store
        }
    },

    props: {
        navList: Array,
        title: String,
    },

    data() {
        return {
            activeTab: "All",
        }
    },

    methods: {
        setCurrNav(nav) {
            this.activeTab = nav
            this.$emit("change-nav", nav)
        }
    },
    computed: {
        coolList() {
            const newList = [...this.navList]
            newList.unshift("All")
            return newList
        }
    },
}
</script>

<style scoped>
.menu {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 16px 0 16px;
}

.menu > .navs {
    display: flex;
    column-gap: 20px;
}

.navs > p {
    cursor: pointer;
}


</style>