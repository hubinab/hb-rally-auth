<script setup>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseTable from '@components/BaseTable.vue';
import { useTeamStore } from '@stores/useTeamStore';
import { useRoute } from 'vue-router';
import { onMounted } from 'vue';

const route = useRoute()

const race_id = route.query.filter

onMounted(() => {
    useTeamStore().getTeams()
})
</script>

<template>
    <BaseLayout>
        <BaseTable v-if="useTeamStore().errorMessage === null" :teams="useTeamStore().teams" :race_id="race_id" />
        <div v-else>
            {{ useTeamStore().errorMessage }}
        </div>
    </BaseLayout>
</template>

<route lang="yaml">
name: teams
meta:
  title: Csapatok
</route>