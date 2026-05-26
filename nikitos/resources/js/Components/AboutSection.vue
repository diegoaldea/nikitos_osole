<template>
    <!-- Full-width layout: image bleeds to edge -->
    <div v-if="fullWidthImage" class="flex flex-col md:flex-row items-center">
        <div class="w-full md:w-1/2 p-6 md:p-16 flex flex-col justify-end">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">{{ title }}</h2>
            <slot>
                <p class="text-gray-600 leading-relaxed">{{ description }}</p>
            </slot>
        </div>
        <div class="w-full md:w-1/2">
            <img :src="image" :alt="title" class="w-full h-full object-cover rounded-xl" />
        </div>
    </div>

    <!-- Normal layout: both sides inside container -->
    <div v-else class="flex flex-col md:flex-row items-center gap-6 md:gap-10 my-10 md:my-14"
        :class="imageRight ? 'md:flex-row' : 'md:flex-row-reverse'">
        <div class="flex-1 flex flex-col justify-center">
            <h2 class="text-4xl font-bold text-gray-900 mb-6">{{ title }}</h2>
            <slot>
                <p class="text-gray-600 leading-relaxed">{{ description }}</p>
            </slot>
        </div>
        <div class="shrink-0 w-full md:w-auto">
            <img :src="image" :alt="title" class="w-full h-auto md:w-[481px] md:h-[352px] object-cover rounded-2xl" />
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
