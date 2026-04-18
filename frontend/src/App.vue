<script setup>
import { onMounted } from 'vue';
import { useRaceStore } from '@stores/useRaceStore';

onMounted(() => {
  useRaceStore().getRaces()
})
</script>

<template>
  <RouterView />
</template>
