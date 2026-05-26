<template>
    <PublicLayout>
        <section class="relative h-[410px]">
            <img src="/images/img-products.png" alt="Productos" class="w-full h-full object-cover object-bottom" />
            <div class="absolute inset-0 flex items-center justify-center">
                <h1 class="text-6xl mt-3 font-bold text-white">Productos</h1>
            </div>
        </section>

        <section class="bg-white py-14">
            <div class="max-w-[1224px] mx-auto px-[10px]">
                <div class="flex justify-end mb-10">
                    <a href="#" class="border border-orange-400 text-orange-500 px-8 py-3 rounded-full font-medium hover:bg-orange-50 transition">
                        Descargar catálogo
                    </a>
                </div>

                <div class="flex flex-col md:flex-row gap-10">
                    <aside class="w-full md:w-64 shrink-0">
                        <ul class="flex flex-col gap-5">
                            <li v-for="cat in categories" :key="cat.id">
                                <Link
                                    :href="route('products.category', cat.id)"
                                    class="flex items-start gap-3 text-gray-800 hover:text-gray-900"
                                    :class="cat.id === category.id ? 'font-bold' : 'font-normal'"
                                >
                                    <span class="inline-block w-1.5 h-6 rounded shrink-0 mt-0.5" :style="{ backgroundColor: cat.color }"></span>
                                    <span>{{ cat.name }}</span>
                                </Link>
                            </li>
                        </ul>
                    </aside>

                    <div class="flex-1">
                        <div v-if="products.length" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-[25px]">
                            <ProductCard v-for="product in products" :key="product.id" :product="product" />
                        </div>
                        <div v-else class="text-gray-500 text-lg">
                            No hay productos en esta categoría.
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>

<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import ProductCard from '@/Components/ProductCard.vue';
import { Link } from '@inertiajs/vue3';

defineProps({
    category: Object,
    categories: Array,
    products: Array,
});
</script>
