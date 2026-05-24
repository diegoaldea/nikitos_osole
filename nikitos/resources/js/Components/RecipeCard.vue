<template>
    <Link :href="route('recipes.show', recipe.id)" class="bg-white rounded-xl border border-gray-200 overflow-hidden flex flex-col group p-4">
        <img :src="`/storage/${recipe.image}`" :alt="recipe.title" class="w-full h-72 object-cover rounded-lg" />
        <div class="flex flex-col items-center gap-3 p-5">
            <h3 class="text-xl font-bold text-gray-900 text-center">{{ recipe.title }}</h3>
            <span class="relative text-gray-950 text-base font-sans">
                Ver receta
                <span class="absolute bottom-[-6px] left-1/2 -translate-x-1/2 w-1/2 h-[2px] bg-gray-500 scale-x-0 group-hover:scale-x-100 transition-transform duration-300 origin-center"></span>
            </span>
        </div>
    </Link>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps({
    recipe: Object,
});
</script>
