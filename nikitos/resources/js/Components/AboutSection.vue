<template>
    <!-- Full-width layout: image bleeds to edge -->
    <div v-if="fullWidthImage" class="flex flex-row items-center">
        <div class="w-1/2 p-16 flex flex-col justify-end">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">{{ title }}</h2>
            <slot>
                <p class="text-gray-600 leading-relaxed">{{ description }}</p>
            </slot>
        </div>
        <div class="w-1/2">
            <img :src="image" :alt="title" class="w-full h-full object-cover rounded-xl" />
        </div>
    </div>

    <!-- Normal layout: both sides inside container -->
    <div v-else class="flex flex-col md:flex-row items-center gap-10 my-14"
        :class="imageRight ? 'md:flex-row' : 'md:flex-row-reverse'">
        <div class="flex-1 flex flex-col justify-center">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">{{ title }}</h2>
            <slot>
                <p class="text-gray-600 leading-relaxed">{{ description }}</p>
            </slot>
        </div>
        <div class="shrink-0">
            <img :src="image" :alt="title" class="w-[481px] h-[352px] object-cover rounded-2xl" />
        </div>
    </div>
</template>

<script setup>
defineProps({
    title: String,
    description: String,
    image: String,
    imageRight: {
        type: Boolean,
        default: false,
    },
    fullWidthImage: {
        type: Boolean,
        default: false,
    },
});
</script>
