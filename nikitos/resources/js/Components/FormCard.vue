<template>
    <div class="max-w-2xl">
        <form @submit.prevent="$emit('submit')" class="bg-white rounded-lg shadow p-6 space-y-4">
            <slot />

            <div class="flex gap-3 pt-2">
                <button type="submit" class="bg-orange-500 text-white px-6 py-2 rounded hover:bg-orange-600">
                    Guardar
                </button>
                <Link :href="cancelRoute" class="px-6 py-2 rounded border hover:bg-gray-50">
                    Cancelar
                </Link>
            </div>
        </form>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    cancelRoute: String,
});

defineEmits(['submit']);
</script>