<template>
    <span>This is Section {{ curSec }} of Page {{ curPage }}</span>
</template>

<script>

export default {
    computed: {
        curPage() {
            return this.$route.params.pageNumber
        },
        curSec() {
            return this.$route.params.secNumber
        }
    }
}
</script>