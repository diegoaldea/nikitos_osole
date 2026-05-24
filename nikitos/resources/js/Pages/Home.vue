<template>
    <PublicLayout>
        <section class="relative h-screen flex items-end pb-24">
            <video autoplay muted loop playsinline class="absolute top-0 left-0 w-full h-[150%] object-cover">
                <source src="/videos/nikitos-header.mp4" type="video/mp4" />
            </video>
            <div class="relative z-10 px-14 w-full">
                <h1 class="text-8xl font-bold text-white mb-6">{{ contents.hero_title }}</h1>
                <p class="text-white text-lg mb-12 max-w-md">{{ contents.hero_subtitle }}</p>
                <div class="flex gap-4">
                    <a href="#" class="bg-white text-gray-800 px-6 py-2 rounded-full font-medium flex items-center gap-2 hover:bg-gray-100">
                        Descargar catálogo <span>›</span>
                    </a>
                    <Link :href="route('products.index')" class="border border-white text-white px-6 py-2 rounded-full font-medium hover:bg-white hover:text-gray-800">
                        Ver productos
                    </Link>
                </div>
            </div>
        </section>

        <section id="nosotros" class="relative -mt-2 z-10 h-[610px]">
            <img src="/images/img-nosotros-home.png" alt="" class="w-full h-full" />
            <div class="absolute inset-0 flex items-center px-16">
                <div class="max-w-xl">
                    <h2 class="text-5xl font-bold text-white mb-6">{{ contents.nosotros_title }}</h2>
                    <p class="text-lg text-white mb-14">{{ contents.nosotros_text }}</p>
                    <a href="#" class="bg-white text-orange-500 px-10 py-3 rounded-full font-medium hover:bg-gray-100">
                        Mas info
                    </a>
                </div>
            </div>
        </section>

        <section class="bg-gray-100 pt-48 pb-16 -mt-24">
            <div class="mx-auto px-16">
                <h2 class="font-semibold text-5xl mb-10">Líneas de productos</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-[25px]">
                    <CategoryCard v-for="category in categories.slice(0, 4)" :key="category.id" :category="category" />
                </div>
            </div>
        </section>

        <section class="bg-gray-100 py-16">
            <div class="mx-auto px-16">
                <h2 class="font-semibold text-5xl mb-10">Productos destacados</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-[25px]">
                    <ProductCard v-for="product in featured_products" :key="product.id" :product="product" />
                </div>
            </div>
        </section>

        <section class="bg-gray-100 mb-10">
            <div class="mx-auto px-16">
                <h2 class="font-semibold text-5xl mb-10">Recetas</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-[25px]">
                    <RecipeCard v-for="recipe in recipes" :key="recipe.id" :recipe="recipe" />
                </div>
            </div>
        </section>
    </PublicLayout>
</template>

<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import CategoryCard from '@/Components/CategoryCard.vue';
import ProductCard from '@/Components/ProductCard.vue';
import RecipeCard from '@/Components/RecipeCard.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    categories: Array,
    featured_products: Array,
    recipes: Array,
    contents: Object,
});
</script>
