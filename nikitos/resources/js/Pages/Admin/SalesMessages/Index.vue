<template>
    <AdminLayout>
        <div class="mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Mensajes de ventas</h1>
        </div>

        <DataTable :headers="['Razón social', 'Email', 'Teléfono', 'Ciudad', 'Estado', 'Acciones']">
            <tr v-for="message in messages" :key="message.id" :class="!message.read ? 'bg-orange-50' : ''">
                <td class="px-6 py-4 align-middle font-medium">{{ message.business_name }}</td>
                <td class="px-6 py-4 align-middle">{{ message.email }}</td>
                <td class="px-6 py-4 align-middle">{{ message.phone }}</td>
                <td class="px-6 py-4 align-middle">{{ message.city }}</td>
                <td class="px-6 py-4 align-middle">
                    <span :class="message.read ? 'bg-gray-100 text-gray-500' : 'bg-orange-100 text-orange-700'" class="px-2 py-1 rounded text-xs">
                        {{ message.read ? 'Leído' : 'Sin leer' }}
                    </span>
                </td>
                <td class="px-6 py-4 align-middle">
                    <div class="flex gap-2">
                        <button @click="show(message)" class="text-cyan-700 hover:underline">Ver</button>
                        <button v-if="!message.read" @click="markAsRead(message.id)" class="text-green-600 hover:underline">Marcar leído</button>
                    </div>
                </td>
            </tr>
        </DataTable>

        <!-- Modal -->
        <div v-if="selected" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-lg shadow-lg p-6 max-w-lg w-full mx-4">
                <h2 class="text-lg font-bold mb-4">{{ selected.business_name }}</h2>
                <div class="space-y-2 text-sm">
                    <p><span class="font-medium">CUIT:</span> {{ selected.cuit }}</p>
                    <p><span class="font-medium">Tipo de negocio:</span> {{ selected.business_type }}</p>
                    <p><span class="font-medium">Trayectoria:</span> {{ selected.market_experience }}</p>
                    <p><span class="font-medium">Dirección:</span> {{ selected.address }}</p>
                    <p><span class="font-medium">Ciudad:</span> {{ selected.city }}</p>
                    <p><span class="font-medium">Teléfono:</span> {{ selected.phone }}</p>
                    <p><span class="font-medium">Celular:</span> {{ selected.mobile }}</p>
                    <p><span class="font-medium">Horario:</span> {{ selected.business_hours }}</p>
                    <p><span class="font-medium">Email:</span> {{ selected.email }}</p>
                    <p><span class="font-medium">Observaciones:</span> {{ selected.observations }}</p>
                </div>
                <button @click="selected = null" class="mt-4 bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">
                    Cerrar
                </button>
            </div>
        </div>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { router } from '@inertiajs/vue3';
import DataTable from '@/Components/DataTable.vue';
import { ref } from 'vue';

defineProps({
    messages: Array,
});

const selected = ref(null);

function show(message) {
    selected.value = message;
}

function markAsRead(id) {
    router.patch(route('admin.sales-messages.read', id));
}
</script>