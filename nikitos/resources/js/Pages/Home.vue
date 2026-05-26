<template>
    <PublicLayout>
        <div class="mx-auto">
            <section class="relative h-screen flex items-end pb-36 md:pb-24 overflow-hidden" style="min-height: 100svh;">
                <video autoplay muted loop playsinline class="absolute top-0 left-0 w-full h-[150%] object-cover">
                    <source src="/videos/nikitos-header.mp4" type="video/mp4" />
                </video>
                <div class="max-w-[90%] sm:max-w-[1224px] mx-auto absolute inset-0 mt-52 sm:mt-60 flex flex-col justify-start">
                    <h1 class="text-4xl md:text-8xl font-bold text-white mb-4 md:mb-6">{{ contents.hero_title }}</h1>
                    <p class="text-white text-base md:text-lg mb-8 md:mb-12 max-w-md">{{ contents.hero_subtitle }}</p>
                    <div class="flex flex-col md:flex-row gap-3 md:gap-4">
                        <a href="#" class="bg-white text-gray-800 px-6 py-3 rounded-full font-medium flex items-center justify-center gap-2 hover:bg-gray-100">
                            Descargar catálogo <span>›</span>
                        </a>
                        <Link :href="route('products.index')" class="border border-white text-white px-6 py-3 rounded-full font-medium text-center hover:bg-white hover:text-gray-800">
                            Ver productos
                        </Link>
                    </div>
                </div>
            </section>
        </div>

        <!-- Mobile nosotros -->
        <section id="nosotros" class="md:hidden z-10 relative" style="overflow: hidden; margin-top: -200px;">
            <img src="/images/img-nosotros-home-top.png" alt="" class="block" style="width: 100%; transform: scaleX(1.04); transform-origin: center; margin-bottom: -2px;" />
            <div style="background-color: #FFA221; height: 200px;"></div>
            <img src="/images/img-nosotros-home-bottom.png" alt="" class="block" style="width: 100%; transform: scaleX(1.04); transform-origin: center; margin-top: -2px;" />
            <div class="absolute inset-0 flex items-center px-6" style="padding-bottom: 70px;">
                <div style="width: 50%;">
                    <h2 class="text-xl font-bold text-white mb-3">{{ contents.nosotros_title }}</h2>
                    <p class="text-xs text-white mb-5">{{ contents.nosotros_text }}</p>
                    <a href="#" class="bg-white text-orange-500 px-6 py-2 text-sm rounded-full font-medium inline-block">
                        Mas info
                    </a>
                </div>
            </div>
        </section>

        <!-- Desktop nosotros -->
        <section id="nosotros" class="hidden md:block relative -mt-[380px] z-10 h-[580px] sm:h-[875px]">
            <img src="/images/img-nosotros-home.png" alt="" class="w-full h-80 lg:h-full" />
            <div class="max-w-[1224px] mx-auto absolute inset-0 flex items-center">
                <div class="max-w-xl">
                    <h2 class="text-5xl font-bold text-white mb-6">{{ contents.nosotros_title }}</h2>
                    <p class="text-lg text-white mb-14">{{ contents.nosotros_text }}</p>
                    <a href="#" class="bg-white text-orange-500 px-10 py-3 rounded-full font-medium hover:bg-gray-100">
                        Mas info
                    </a>
                </div>
            </div>
        </section>

        <section class="bg-gray-100 pt-16 md:pt-48 pb-16 -mt-8 md:-mt-24">
            <div class="max-w-[1224px] mx-auto px-[10px]">
                <h2 class="font-medium text-xl md:text-5xl md:font-semibold" style="margin-bottom: 1.5rem;">Líneas de productos</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-[25px]">
                    <CategoryCard v-for="category in categories.slice(0, 4)" :key="category.id" :category="category" />
                </div>
            </div>
        </section>

        <section class="bg-gray-100 py-16">
            <div class="max-w-[1224px] mx-auto px-[10px]">
                <h2 class="font-medium text-xl md:text-5xl md:font-semibold" style="margin-bottom: 1.5rem;">Productos destacados</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-[25px]">
                    <ProductCard v-for="product in featured_products" :key="product.id" :product="product" />
                </div>
            </div>
        </section>

        <section class="bg-gray-100 mb-10">
            <div class="max-w-[1224px] mx-auto px-[10px]">
                <h2 class="font-medium text-xl md:text-5xl md:font-semibold" style="margin-bottom: 1.5rem;">Recetas</h2>
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
