import { defineStore } from "pinia";
import { api } from "@utils/http.mjs";
import { reactive } from "vue";

export const useRaceStore = defineStore('races', () => {
    const races = reactive([])

    async function getRaces() {
        const response = await api.get("/races")
        Object.assign(races, response.data.data)        
    }

    async function getRace(id) {
        const response = await api.get(`/races/${id}`)
        return response.data.data
    }

    return {
        races,
        getRaces,
        getRace,
        
    }
})