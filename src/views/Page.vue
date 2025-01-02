<template>
    <div class="article">
        <article class="article-sec">
            <span>Welcome to Page {{ curPage }}</span>
            <hr class="new2">
            <RouterView/>
            <p v-show="haveMessage">
                Message from Page {{ store.lastPage }} : {{ getMessage }}
            </p>
        </article>
    </div>
</template>

<script>
import { useMessageStore } from '@/stores/Info';

export default {
    setup() {
        const store = useMessageStore()
        return {
            store,
        }
    },
    computed: {
        curPage() {
            return this.$route.params.pageNumber
        },
        curSec() {
            return this.$route.params.secNumber
        },
        getMessage() {
            const fromPage = this.store.lastPage;
            const message = this.store.pages[fromPage];
            if(message) {
                return message;
            }
            return "";
        },

        haveMessage() {
            const fromPage = this.store.lastPage;

            if(this.$route.params.pageNumber === fromPage) {
                return false;
            }

            if(this.store.pages[fromPage]) {
                return true;
            }

            return false;
        }
    }
}
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Goldman:wght@400;700&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Quattrocento+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Quicksand:wght@300..700&family=Rajdhani:wght@300;400;500;600;700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto+Flex:opsz,wght@8..144,100..1000&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Roboto+Serif:ital,opsz,wght@0,8..144,100..900;1,8..144,100..900&display=swap');

.article {
    width: 100%;
}
.article-sec {
    display: flex;
    flex-direction: column;
    align-items: center;
    font-size: 20px;
    font-weight: 600;
    line-height: 6vh;
}
hr.new2 {
    width: 30vw;
    border-top: 2px dashed black;
}
</style>