import { defineStore } from 'pinia'

export const useMessageStore = defineStore('message', {
    state: () => {
        return {
            pages: {},
            lastPage: 1,
            message: "",
        }
    }
})