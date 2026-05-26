<template>
    <PublicLayout>
        <section class="relative h-[410px]">
            <img src="/images/img-products.png" alt="Productos" class="w-full h-full object-cover object-bottom" />
            <div class="absolute inset-0 flex items-center justify-center">
                <h1 class="text-6xl mt-3 font-bold text-white">Productos</h1>
            </div>
        </section>

        <section class="bg-white py-14 mt-6 pt-6">
            <div class="max-w-[1224px] mx-auto px-[10px]">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-[25px]">
                    <CategoryCard v-for="category in categories" :key="category.id" :category="category" />
                </div>
            </div>
        </section>
    </PublicLayout>
</template>

<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import CategoryCard from '@/Components/CategoryCard.vue';

defineProps({
    categories: Array,
});
</script>
