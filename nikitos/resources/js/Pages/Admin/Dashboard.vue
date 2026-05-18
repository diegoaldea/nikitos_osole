<template>
    <AdminLayout>
        <h1 class="text-2xl font-bold text-gray-800 mb-6">
            Dashboard
        </h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <StatCard title="Categorías" :value="stats.categories" />
            <StatCard title="Productos" :value="stats.products" />
            <StatCard title="Recetas" :value="stats.recipes" />
            <StatCard title="Puntos de venta" :value="stats.locations" />
            <StatCard title="Mensajes sin leer" :value="stats.sales_messages" color="text-orange-500" />
            <StatCard title="Postulaciones sin leer" :value="stats.job_applications" color="text-orange-500" />
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import StatCard from '@/Components/StatCard.vue';

const props = defineProps({
   stats: Object 
});
</script>