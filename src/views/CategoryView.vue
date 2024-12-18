<template>
    <Header :category="category.name"/>
</template>
<script>
import Header from '@/components/Header.vue';
import { useProductStore } from '@/stores/product';
import { mapState } from 'pinia';
export default {
    setup() {
        const store = useProductStore();
        return {
            store,
        }
    },
    components: {
        Header,
    },
    props: {
        categoryId: Number,
    },
    computed: {
        ...mapState(useProductStore, {
            categories: "categories",
        }),
        category() {
            return this.categories[this.categoryId - 1];
        }
    },
}
</script>