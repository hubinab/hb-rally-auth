import { defineStore } from "pinia";
import { api } from "@utils/http.mjs";
import { ref } from "vue";


export const useLoginStore = defineStore('login', () => {

    const token = ref(null)
    
    async function login(data) {
        const response = await api.post('login', data)
        token.value = response.data.data.token
    }

    function logout() {
        token.value = null
        localStorage.removeItem('token')
    }

    return {
        login,
        logout,
        token,

    }
})