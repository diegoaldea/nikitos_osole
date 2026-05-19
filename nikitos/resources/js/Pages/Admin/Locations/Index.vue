<template>
    <AdminLayout>
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Puntos de venta</h1>
            <Link :href="route('admin.locations.create')" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">
                Nueva ubicación
            </Link>
        </div>

        <DataTable :headers="['Provincia', 'Ciudad', 'Latitud', 'Longitud', 'Acciones']">
            <tr v-for="location in locations" :key="location.id">
                <td class="px-6 py-4 align-middle">{{ location.province }}</td>
                <td class="px-6 py-4 align-middle font-medium">{{ location.city }}</td>
                <td class="px-6 py-4 align-middle">{{ location.latitude }}</td>
                <td class="px-6 py-4 align-middle">{{ location.longitude }}</td>
                <td class="px-6 py-4 align-middle">
                    <div class="flex gap-2">
                        <Link :href="route('admin.locations.edit', location.id)" class="text-cyan-700 hover:underline">
                            Editar
                        </Link>
                        <button @click="destroy(location.id)" class="text-red-500 hover:underline">
                            Eliminar
                        </button>
                    </div>
                </td>
            </tr>
        </DataTable>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { Link, router } from '@inertiajs/vue3';
import DataTable from '@/Components/DataTable.vue';

defineProps({
    locations: Array,
});

function destroy(id) {
    if (confirm('¿Confirma la eliminación de la ubicación?')) {
        router.delete(route('admin.locations.destroy', id));
    }
}
</script>