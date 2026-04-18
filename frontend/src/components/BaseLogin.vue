<script setup>
import { reactive } from 'vue';
import { useRouter } from 'vue-router';
import { useLoginStore } from '@stores/useLoginStore';

const router = useRouter()

const form = reactive({
    "email": "",
    "password": ""
})

async function submitForm() {
    useLoginStore().login(form)
    router.push("/")
}

</script>

<template>
    <div class="max-w-2xl mx-auto bg-white p-8 rounded-2xl shadow-lg border border-slate-100">
        <h2 class="text-2xl font-bold text-slate-800 mb-6">Bejelentkezés</h2>
        <form @submit.prevent="submitForm" class="grid grid-cols-1 gap-6">
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">E-mail cím</label>
                <input type="text" id="email" v-model="form.email"
                    class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>
            <div>
                <label class="block text-sm font-medium text-slate-700 mb-1">Jelszó</label>
                <input type="password" id="password" v-model="form.password"
                    class="w-full px-4 py-2 rounded-lg border border-slate-200 focus:ring-2 focus:ring-blue-500 outline-none">
            </div>
            <button type="submit"
                class="w-full py-3 bg-blue-600 text-white font-bold rounded-lg hover:bg-blue-700 transition-colors">
                Belépés
            </button>
        </form>
    </div>
</template>