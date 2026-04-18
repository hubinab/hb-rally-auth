import axios from 'axios'
import { useLoginStore } from '@stores/useLoginStore'

export const api = axios.create({
    baseURL: import.meta.env.VITE_BACKEND_URL,
    headers: {
        "Accept": "application/json",
        "Content-Type": "application/json"
    }
})

// copilot irta, meglatjuk jo-e. Elvileg itt ez garantalja,
// hogy a kereseknel a local storage-ban eltarolt tokent
// bekuldje
api.interceptors.request.use(config => {
    const auth = useLoginStore()

    if (auth.token) {
        config.headers.Authorization = `Bearer ${auth.token}`
    }

    return config
})