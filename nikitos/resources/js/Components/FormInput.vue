<template>
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">{{ label }}</label>

        <textarea
            v-if="type === 'textarea'"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400"
            rows="4"
        />

        <select
            v-else-if="type === 'select'"
            :value="modelValue"
            @change="$emit('update:modelValue', $event.target.value)"
            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400"
        >
            <option value="">Seleccionar...</option>
            <option v-for="option in options" :key="option.value" :value="option.value">
                {{ option.label }}
            </option>
        </select>

        <div v-else-if="type === 'file'">
            <img v-if="preview" :src="preview" class="w-24 h-24 object-cover rounded mb-2" />
            <input
                type="file"
                :accept="accept"
                @change="handleFile"
                class="w-full border rounded px-3 py-2"
            />
        </div>

        <div v-else-if="type === 'color'" class="flex flex-wrap gap-2">
            <button
                v-for="color in options"
                :key="color"
                type="button"
                @click="$emit('update:modelValue', color)"
                :style="{ backgroundColor: color }"
                :class="modelValue === color ? 'ring-2 ring-offset-2 ring-gray-800' : ''"
                class="w-8 h-8 rounded-full border border-gray-200"
            />
        </div>

        <input
            v-else
            :type="type"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400"
        />

        <p v-if="error" class="text-red-500 text-xs mt-1">{{ error }}</p>
    </div>
</template>

<script setup>
const props = defineProps({
    label: String,
    modelValue: [String, Number, File],
    type: {
        type: String,
        default: 'text',
    },
    error: String,
    options: Array,
    accept: String,
    preview: String,
});

function handleFile(event) {
    const file = event.target.files[0];
    emit('update:modelValue', file);
}

const emit = defineEmits(['update:modelValue', 'file-change']);
</script>