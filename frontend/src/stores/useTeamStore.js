import { defineStore } from "pinia";
import { api } from "@utils/http.mjs";
import { reactive, ref } from "vue";

export const useTeamStore = defineStore('teams', () => {
    const teams = reactive([])
    const errorMessage = ref(null)

    async function getTeams() {

        errorMessage.value = null
        // ezt a try-catch-et is a copilot adta:
        try {
            const response = await api.get("/teams")
            Object.assign(teams, response.data.data)
        } catch (error) {
            switch (error.response?.status) {
                case 401:
                    errorMessage.value = "Nincs bejelentkezve!"
                    break;

                case 403:
                    errorMessage.value = "Nincs jogosultsága az oldal megtekintéséhez!"
                    break;

                default:
                    errorMessage.value = "Ismeretlen hiba történt"
                    break;
            }
        }
    }

    return {
        errorMessage,
        teams,
        getTeams,

    }
})