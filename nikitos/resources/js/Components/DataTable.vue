<template>
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="w-full text-sm text-left">
            <thead class="bg-gray-50 text-gray-600 uppercase text-xs">
                <tr>
                    <th v-for="header in headers" :key="header" class="px-6 py-3 text-left">
                        {{ header }}
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                <slot />
            </tbody>
        </table>
    </div>
</template>

<script setup>
defineProps({
    headers: Array,
})
</script>