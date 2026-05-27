<template>
    <Link :href="route('products.show', product.id)" class="bg-white rounded-xl border border-gray-200 p-6 flex flex-col items-center gap-3 group">
        <img :src="`/storage/${product.image}`" :alt="product.name" class="w-48 h-48 object-contain" />
        <div class="text-center">
            <p class="text-sm font-medium mb-1" :style="{ color: product.category.color }">{{ product.category.name }}</p>
            <h3 class="text-xl font-bold text-gray-900 mb-3">{{ product.name }}</h3>
            <span class="relative text-gray-500 text-sm font-semibold">
                Ver producto
                <span class="absolute bottom-[-6px] left-1/2 -translate-x-1/2 w-1/2 h-[2px] bg-gray-500 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></span>
            </span>
        </div>
    </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    product: Object,
});
</script>
