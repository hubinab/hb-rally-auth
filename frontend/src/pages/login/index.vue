<script setup>
import BaseLayout from '@layouts/BaseLayout.vue'
import BaseLogin from '@components/BaseLogin.vue';
import { useLoginStore } from '@stores/useLoginStore';
import { onMounted } from 'vue';

onMounted(() => {
    useLoginStore().logout()
})

</script>

<template>
    <BaseLayout>
        <BaseLogin />
    </BaseLayout>
</template>

<route lang="yaml">
name: login
meta:
  title: Bejelentkezés
</route>