<template>
    <PublicLayout>
        <section class="relative h-[280px] md:h-[410px]">
            <img src="/images/img-products.png" alt="Productos" class="w-full h-full object-cover object-bottom" />
            <div class="absolute inset-0 flex items-center justify-center">
                <h1 class="text-4xl md:text-6xl mt-3 font-bold text-white">Productos</h1>
            </div>
        </section>

        <section class="bg-white py-14">
            <div class="max-w-[1224px] mx-auto px-[10px]">
                <div class="flex flex-col md:flex-row gap-10">
                    <!-- Sidebar de categorías -->
                    <aside class="w-full md:w-72 shrink-0">
                        <ul class="border-t border-neutral-200 list-none p-0 m-0">
                            <li v-for="cat in categories" :key="cat.id" class="border-b border-neutral-200">
                                <Link
                                    :href="route('products.category', cat.id)"
                                    preserve-scroll
                                    class="cursor-pointer text-black py-4 pl-0 pr-4 flex gap-3 items-center duration-300 transition-colors hover:bg-orange-100"
                                    :class="cat.id === product.category_id ? 'font-bold' : 'font-normal'"
                                >
                                    <span class="block shrink-0" :style="{ backgroundColor: cat.color, width: '10px', height: '25px' }"></span>
                                    <span>{{ cat.name }}</span>
                                </Link>
                            </li>
                        </ul>
                    </aside>

                    <!-- Contenido principal -->
                    <div class="flex-1">
                        <!-- Anterior / Siguiente -->
                        <div class="flex justify-between gap-4 mb-10">
                            <Link
                                v-if="previousProduct"
                                :href="route('products.show', previousProduct.id)"
                                preserve-scroll
                                class="bg-orange-400 border border-orange-400 text-white px-16 py-3 rounded-full font-medium min-w-[240px] text-center hover:bg-white hover:text-orange-500 transition"
                            >
                                Anterior
                            </Link>
                            <span
                                v-else
                                class="inline-block bg-gray-300 border border-gray-300 text-white px-16 py-3 rounded-full font-medium min-w-[240px] text-center cursor-not-allowed select-none"
                            >
                                Anterior
                            </span>

                            <Link
                                v-if="nextProduct"
                                :href="route('products.show', nextProduct.id)"
                                preserve-scroll
                                class="bg-orange-400 border border-orange-400 text-white px-16 py-3 rounded-full font-medium min-w-[240px] text-center hover:bg-white hover:text-orange-500 transition"
                            >
                                Siguiente
                            </Link>
                            <span
                                v-else
                                class="inline-block bg-gray-300 border border-gray-300 text-white px-16 py-3 rounded-full font-medium min-w-[240px] text-center cursor-not-allowed select-none"
                            >
                                Siguiente
                            </span>
                        </div>

                        <!-- Imagen + detalle -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-28">
                            <div>
                                <div class="bg-white border border-gray-200 rounded-xl flex items-center justify-center p-8 h-[420px]">
                                    <img
                                        v-if="product.image"
                                        :src="`/storage/${product.image}`"
                                        :alt="product.name"
                                        class="max-h-full max-w-full object-contain"
                                    />
                                    <span v-else class="text-gray-400 text-sm">Sin imagen</span>
                                </div>

                                <div v-if="product.image" class="mt-4">
                                    <div class="w-24 h-24 border-2 border-gray-200 hover:border-orange-400 rounded-lg p-1 flex items-center justify-center transition-colors cursor-pointer">
                                        <img :src="`/storage/${product.image}`" :alt="product.name" class="max-h-full max-w-full object-contain" />
                                    </div>
                                </div>
                            </div>

                            <div class="flex flex-col">
                                <p class="text-sm font-medium mb-2" :style="{ color: product.category.color }">{{ product.category.name }}</p>
                                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-8">{{ product.name }}</h2>

                                <div class="space-y-5 mb-10">
                                    <div v-if="product.code">
                                        <p class="text-gray-500 font-medium">Codigo</p>
                                        <p class="text-gray-900">{{ product.code }}</p>
                                    </div>
                                    <div v-if="product.size">
                                        <p class="text-gray-500 font-medium">Tamaño</p>
                                        <p class="text-gray-900">{{ product.size }}</p>
                                    </div>
                                    <div v-if="product.shelf_life">
                                        <p class="text-gray-500 font-medium">Vida util</p>
                                        <p class="text-gray-900">{{ product.shelf_life }}</p>
                                    </div>
                                </div>

                                <Link
                                    :href="route('contact.index')"
                                    class="bg-orange-400 text-white px-16 py-3 rounded-full font-medium min-w-[240px] text-center hover:bg-orange-500 transition w-fit"
                                >
                                    Consultar
                                </Link>
                            </div>
                        </div>

                        <!-- Productos relacionados -->
                        <div v-if="relatedProducts.length">
                            <h3 class="text-3xl font-bold text-gray-900 mb-6">Productos relacionados</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-[25px]">
                                <ProductCard v-for="related in relatedProducts" :key="related.id" :product="related" />
                            </div>
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
    product: Object,
    categories: Array,
    previousProduct: Object,
    nextProduct: Object,
    relatedProducts: Array,
});
</script>
