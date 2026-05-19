<template>
    <AdminLayout>
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Nueva ubicación</h1>

        <FormCard :cancel-route="route('admin.locations.index')" @submit="submit">
            <FormInput v-model="form.province" label="Provincia *" :error="form.errors.province" />
            <FormInput v-model="form.city" label="Ciudad *" :error="form.errors.city" />
            <FormInput v-model="form.latitude" label="Latitud *" type="number" :error="form.errors.latitude" />
            <FormInput v-model="form.longitude" label="Longitud *" type="number" :error="form.errors.longitude" />
        </FormCard>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { useForm } from '@inertiajs/vue3';
import FormCard from '@/Components/FormCard.vue';
import FormInput from '@/Components/FormInput.vue';

const form = useForm({
    province: '',
    city: '',
    latitude: '',
    longitude: '',
});

function submit() {
    form.post(route('admin.locations.store'));
}
</script>