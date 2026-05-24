<template>
    <Link :href="route('products.index', { category: category.id })" class="flex flex-col items-center justify-between gap-5 p-8 rounded-lg cursor-pointer duration-300 relative group h-[322px]" :style="{ backgroundColor: category.color }">
        <div class="absolute inset-0 bg-black opacity-0 group-hover:opacity-15 transition-opacity duration-300 rounded-lg"></div>
        <img :src="`/storage/${category.image}`" :alt="category.name" class="w-40 h-40 object-cover z-10" />
        <div class="relative z-10 text-center">
            <h3 class="text-white font-semibold text-2xl text-center mb-3">{{ category.name }}</h3>
            <span class="relative text-white text-sm font-medium">
                Ver todos
                <span class="absolute bottom-[-6px] left-1/2 -translate-x-1/2 w-1/2 h-[2px] bg-white scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></span>
            </span>
        </div>
    </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    category: Object,
});
</script>
