<template>
    <AdminLayout>
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Productos</h1>
            <Link :href="route('admin.products.create')" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">
                Nuevo producto
            </Link>
        </div>

        <DataTable :headers="['Imagen', 'Nombre', 'Categoría', 'Código', 'Destacado', 'Acciones']">
            <tr v-for="product in products" :key="product.id">
                <td class="px-6 py-4 align-middle">
                    <img v-if="product.image" :src="`/storage/${product.image}`" class="w-12 h-12 object-cover rounded" />
                    <span v-else class="text-gray-400 text-xs">Sin imagen</span>
                </td>
                <td class="px-6 py-4 align-middle font-medium">{{ product.name }}</td>
                <td class="px-6 py-4 align-middle">{{ product.category.name }}</td>
                <td class="px-6 py-4 align-middle">{{ product.code }}</td>
                <td class="px-6 py-4 align-middle">
                    <span :class="product.featured ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-500'" class="px-2 py-1 rounded text-xs">
                        {{ product.featured ? 'Sí' : 'No' }}
                    </span>
                </td>
                <td class="px-6 py-4 align-middle">
                    <div class="flex gap-2">
                        <Link :href="route('admin.products.edit', product.id)" class="text-cyan-700 hover:underline">
                            Editar
                        </Link>
                        <button @click="destroy(product.id)" class="text-red-500 hover:underline">
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
    products: Array,
});

function destroy(id) {
    if (confirm('¿Confirma la eliminación del producto?')) {
        router.delete(route('admin.products.destroy', id));
    }
}
</script>