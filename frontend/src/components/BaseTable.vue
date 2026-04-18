<script setup>
import { computed, onMounted, reactive } from 'vue';
import { useRaceStore } from '@stores/useRaceStore';

const { teams, race_id } = defineProps({
    teams: Array,
    race_id: String
})

const filteredTeams = computed(() => {
    return teams.filter(team => team.race.id == race_id)
})

const race = reactive({})

onMounted(async () => {
    Object.assign(race, await useRaceStore().getRace(race_id))
})
</script>

<template>
    <h1 class="text-6xl text-center font-bold mb-10">{{ race.name }}</h1>
    <div class="overflow-x-auto bg-white rounded-lg shadow">
        <table class="min-w-full text-left text-sm whitespace-nowrap">
            <thead class="uppercase tracking-wider border-b-2 border-gray-200 bg-gray-50 text-gray-600">
                <tr>
                    <th scope="col" class="px-6 py-4">Név</th>
                    <th scope="col" class="px-6 py-4">Ország</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                <tr class="hover:bg-gray-50 transition-colors" v-for="team in filteredTeams">
                    <td class="px-6 py-4 font-medium text-gray-900">{{ team.name }}</td>
                    <td class="px-6 py-4 text-gray-600">{{ team.country }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>