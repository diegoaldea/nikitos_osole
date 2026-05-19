<template>
    <AdminLayout>
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Nuevo producto</h1>

        <FormCard :cancel-route="route('admin.products.index')" @submit="submit">
            <FormInput v-model="form.name" label="Nombre *" :error="form.errors.name" />
            <FormInput
                v-model="form.category_id"
                label="Categoría *"
                type="select"
                :options="categories.map(c => ({ value: c.id, label: c.name }))"
                :error="form.errors.category_id"
            />
            <FormInput v-model="form.code" label="Código" :error="form.errors.code" />
            <FormInput v-model="form.size" label="Tamaño" :error="form.errors.size" />
            <FormInput v-model="form.shelf_life" label="Vida útil" :error="form.errors.shelf_life" />
            <FormInput
                v-model="form.image"
                label="Imagen"
                type="file"
                accept="image/*"
                :error="form.errors.image"
            />
            <div class="flex items-center gap-2">
                <input type="checkbox" v-model="form.featured" id="featured" class="w-4 h-4" />
                <label for="featured" class="text-sm font-medium text-gray-700">Producto destacado</label>
            </div>
        </FormCard>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { useForm } from '@inertiajs/vue3';
import FormCard from '@/Components/FormCard.vue';
import FormInput from '@/Components/FormInput.vue';

defineProps({
    categories: Array,
});

const form = useForm({
    name: '',
    category_id: '',
    code: '',
    size: '',
    shelf_life: '',
    image: null,
    featured: false,
});

function submit() {
    form.post(route('admin.products.store'), {
        forceFormData: true,
    });
}
</script>