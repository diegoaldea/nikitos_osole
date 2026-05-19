<template>
    <AdminLayout>
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Nueva categoría</h1>

        <FormCard :cancel-route="route('admin.categories.index')" @submit="submit">
            <FormInput v-model="form.name" label="Nombre *" :error="form.errors.name" />
            <FormInput 
                v-model="form.color" 
                label="Color" 
                type="color" 
                :options="colors"
                :error="form.errors.color" 
            />
            <FormInput 
                v-model="form.image" 
                label="Imagen" 
                type="file" 
                accept="image/*"
                :error="form.errors.image" 
            />
        </FormCard>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { useForm } from '@inertiajs/vue3';
import FormCard from '@/Components/FormCard.vue';
import FormInput from '@/Components/FormInput.vue';

const colors = [
    '#e8528b', '#e8a090', '#c47878', '#c8a8e8', '#b898e8',
    '#d4a050', '#28b878', '#f0a0c0', '#30b8c0', '#e84040',
    '#a0d8d0', '#a8c8e8'
];

const form = useForm({
    name: '',
    color: '',
    image: null,
});

function submit() {
    form.post(route('admin.categories.store'), {
        forceFormData: true,
    });
}
</script>