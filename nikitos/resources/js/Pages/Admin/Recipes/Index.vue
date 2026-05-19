<template>
    <AdminLayout>
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Recetas</h1>
            <Link :href="route('admin.recipes.create')" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">
                Nueva receta
            </Link>
        </div>

        <DataTable :headers="['Imagen', 'Título', 'Tiempo', 'Porciones', 'Acciones']">
            <tr v-for="recipe in recipes" :key="recipe.id">
                <td class="px-6 py-4 align-middle">
                    <img v-if="recipe.image" :src="`/storage/${recipe.image}`" class="w-12 h-12 object-cover rounded" />
                    <span v-else class="text-gray-400 text-xs">Sin imagen</span>
                </td>
                <td class="px-6 py-4 align-middle font-medium">{{ recipe.title }}</td>
                <td class="px-6 py-4 align-middle">{{ recipe.preparation_time }} min</td>
                <td class="px-6 py-4 align-middle">{{ recipe.servings }}</td>
                <td class="px-6 py-4 align-middle">
                    <div class="flex gap-2">
                        <Link :href="route('admin.recipes.edit', recipe.id)" class="text-cyan-700 hover:underline">
                            Editar
                        </Link>
                        <button @click="destroy(recipe.id)" class="text-red-500 hover:underline">
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
    recipes: Array,
});

function destroy(id) {
    if (confirm('¿Confirma la eliminación de la receta?')) {
        router.delete(route('admin.recipes.destroy', id));
    }
}
</script>