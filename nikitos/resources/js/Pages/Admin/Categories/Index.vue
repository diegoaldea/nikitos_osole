<template>
    <AdminLayout>
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">
                Categorías
            </h1>
            <Link :href="route('admin.categories.create')" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">
                Nueva categoría
            </Link>
        </div>

        <DataTable :headers="['Imagen', 'Nombre', 'Color', 'Productos', 'Acciones']">
            <tr v-for="category in categories" :key="category.id">
                <td class="px-6 py-4 align-middle">
                    <img v-if="category.image" :src="`/storage/${category.image}`" class="w-12 h-12 object-cover rounded" />
                    <span v-else class="text-gray-400 text-xs">Sin imagen</span>
                </td>
                <td class="px-6 py-4 font-medium align-middle">{{ category.name }}</td>
                <td class="px-6 py-4 align-middle">
                    <span class="px-2 py-1 rounded text-white text-xs" :style="{ backgroundColor: category.color }">
                        {{ category.color }}
                    </span>
                </td>
                <td class="px-6 py-4 align-middle">{{ category.products_count }}</td>
                <td class="px-6 py-4 align-middle">
                    <div class="flex gap-2">
                        <Link :href="route('admin.categories.edit', category.id)" class="text-cyan-700 hover:underline">
                            Editar
                        </Link>
                        <button @click="destroy(category.id)" class="text-red-500 hover:underline">
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
    categories: Array,
});

function destroy(id){
    if(confirm('Confirma la eliminación de la categoría')){
        router.delete(route('admin.categories.destroy', id));
    }
}
</script>