<script setup>
const { race } = defineProps({
    race: Object
})
</script>

<template>
    <div
        class="group bg-white rounded-2xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden cursor-pointer border border-slate-100">
        <div class="p-6">
            <div class="flex justify-between items-start mb-4">
                <h3 class="text-xl font-bold text-slate-800 group-hover:text-blue-600 transition-colors">
                    <RouterLink :to="{name: 'teams', query: { filter: race?.id }}">
                        {{ race?.name }}
                    </RouterLink>
                </h3>
                <span class="px-3 py-1 bg-blue-50 text-blue-600 text-xs font-medium rounded-full">
                    {{ race?.location }}
                </span>
            </div>
            <div class="space-y-2">
                <p class="text-sm text-slate-500 flex items-center">
                    <span class="w-4 h-4 mr-2 bg-slate-100 rounded-full flex-shrink-0"></span>
                    {{ race?.date }}
                </p>
            </div>
        </div>
    </div>
</template>