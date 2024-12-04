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
    /* Lato font */
    @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap");
    /* Quicksand font */
    @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Quicksand:wght@300..700&display=swap");
    /* Montserat */
    @import url("https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Quicksand:wght@300..700&display=swap");
    .quicksand-regular {
        font-family: "Quicksand", serif;
        font-optical-sizing: auto;
        font-weight: 700;
        font-style: normal;
    }
    .lato-bold {
        font-family: "Lato", sans-serif;
        font-weight: 900;
        font-style: normal;
    }
    .lato-regular {
        font-family: "Lato", sans-serif;
        font-weight: 400;
        font-style: normal;
    }
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