<template>
    <AdminLayout>
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Contenidos del sitio</h1>

        <form @submit.prevent="submit" class="bg-white rounded-lg shadow p-6 space-y-6">
            <div v-for="content in contents" :key="content.key">
                <label class="block text-sm font-medium text-gray-700 mb-1 capitalize">
                    {{ content.key.replaceAll('_', ' ') }}
                </label>

                <textarea
                    v-if="content.type === 'text'"
                    v-model="form.texts[content.key]"
                    rows="2"
                    class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400"
                ></textarea>

                <div v-else-if="content.type === 'image'" class="space-y-2">
                    <img
                        v-if="content.value"
                        :src="`/storage/${content.value}`"
                        :alt="content.key"
                        class="h-32 w-auto rounded border"
                    />
                    <p v-else class="text-sm text-gray-500">Sin imagen cargada.</p>
                    <input
                        type="file"
                        accept="image/*"
                        @change="form.images[content.key] = $event.target.files[0]"
                        class="block text-sm"
                    />
                </div>
            </div>

            <button
                type="submit"
                :disabled="form.processing"
                class="bg-orange-500 text-white px-6 py-2 rounded hover:bg-orange-600 disabled:opacity-50"
            >
                Guardar cambios
            </button>
        </form>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    contents: Array,
});

const texts = {};
const images = {};
props.contents.forEach((c) => {
    if (c.type === 'text') texts[c.key] = c.value ?? '';
    if (c.type === 'image') images[c.key] = null;
});

const form = useForm({
    texts,
    images,
});

function submit() {
    form.post(route('admin.site-contents.update'), {
        forceFormData: true,
        preserveScroll: true,
    });
}
</script>
