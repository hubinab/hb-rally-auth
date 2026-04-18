<script setup>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseCard from '@components/BaseCard.vue';
import { useRaceStore } from '@stores/useRaceStore';
</script>

<template>
  <BaseLayout>
    <div class="mt-5">
      <RouterLink :to="{ name: 'login' }"
        class="w-full p-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition-colors">
        Bejelentkezés
      </RouterLink>
    </div>
    <h1 class="text-6xl text-center font-bold mb-10">Versenyek</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
      <BaseCard v-for="race of useRaceStore().races" :key="race.id" :race/>
    </div>
  </BaseLayout>
</template>

<route lang="yaml">
name: index
meta:
  title: Főoldal
</route>
