<template>
    <div class="bg-white rounded-lg shadow p-6">
        <p class="text-sm text-gray-500">{{ title }}</p>
        <p class="text-3xl font-bold" :class="color">{{ value }}</p>
    </div>
</template>

<script setup>
defineProps({
    title: String,
    value: Number,
    color: {
        type: String,
        default: 'text-cyan-900'
    }
});
</script>