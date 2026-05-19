<template>
    <AdminLayout>
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Contenidos del sitio</h1>

        <form @submit.prevent="submit" class="bg-white rounded-lg shadow p-6 space-y-4">
            <div v-for="(value, key) in form.contents" :key="key">
                <label class="block text-sm font-medium text-gray-700 mb-1">{{ key }}</label>
                <input
                    v-model="form.contents[key]"
                    type="text"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400"
                />
            </div>

            <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded hover:bg-orange-600">
                Guardar cambios
            </button>
        </form>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    contents: Object,
});

const form = useForm({
    contents: { ...props.contents },
});

function submit() {
    form.put(route('admin.site-contents.update'));
}
</script>