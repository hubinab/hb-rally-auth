import { defineStore } from "pinia";
import { api } from "@utils/http.mjs";
import { reactive, ref } from "vue";

export const useTeamStore = defineStore('teams', () => {
    const teams = reactive([])
    const errorMessage = ref(null)

    async function getTeams() {
        // ezt a try-catch-et is a copilot adta:
        try {
            const response = await api.get("/teams")
            Object.assign(teams, response.data.data)
        } catch (error) {
            if (error.response?.status === 401) {
                errorMessage.value = "Nincs jogosultsága az oldalhoz!"
            } else {
                errorMessage.value = "Ismeretlen hiba történt"
            }
        }
    }

    return {
        errorMessage,
        teams,
        getTeams,
        
    }
})