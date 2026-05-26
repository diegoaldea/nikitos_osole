<template>
    <PublicLayout>
        <section class="relative h-[410px]">
            <img src="/images/img-recipes.png" alt="Recetas" class="w-full h-full object-cover object-bottom" />
            <div class="absolute inset-0 flex items-center justify-center">
                <h1 class="text-6xl mt-3 font-bold text-white">Recetas</h1>
            </div>
        </section>

        <section class="bg-white py-14 mt-6 pt-6">
            <div class="max-w-[1224px] mx-auto px-[10px]">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-[25px]">
                    <RecipeCard v-for="recipe in recipes" :key="recipe.id" :recipe="recipe" />
                </div>
            </div>
        </section>
    </PublicLayout>
</template>

<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import RecipeCard from '@/Components/RecipeCard.vue';

defineProps({
    recipes: Array,
});
</script>
