<template>
    <AdminLayout>
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Nueva receta</h1>

        <FormCard :cancel-route="route('admin.recipes.index')" @submit="submit">
            <FormInput v-model="form.title" label="Título *" :error="form.errors.title" />
            <FormInput v-model="form.preparation_time" label="Tiempo de preparación (minutos) *" type="number" :error="form.errors.preparation_time" />
            <FormInput v-model="form.servings" label="Porciones *" type="number" :error="form.errors.servings" />
            <FormInput v-model="form.image" label="Imagen" type="file" accept="image/*" :error="form.errors.image" />

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Ingredientes *</label>
                
                <div v-for="(group, groupIndex) in form.ingredients" :key="groupIndex" class="mb-4 border rounded p-4">
                    <div class="flex gap-2 mb-2">
                        <input 
                            v-model="group.title" 
                            type="text" 
                            placeholder="Título del grupo (ej: Guacamole)"
                            class="flex-1 border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400" 
                        />
                        <button type="button" @click="removeGroup(groupIndex)" class="text-red-500 px-2">✕</button>
                    </div>
                    <div v-for="(item, itemIndex) in group.items" :key="itemIndex" class="flex gap-2 mb-2 pl-4">
                        <input 
                            v-model="group.items[itemIndex]" 
                            type="text" 
                            placeholder="Ingrediente"
                            class="flex-1 border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400" 
                        />
                        <button type="button" @click="removeItem(groupIndex, itemIndex)" class="text-red-500 px-2">✕</button>
                    </div>
                    <button type="button" @click="addItem(groupIndex)" class="text-cyan-700 text-sm hover:underline pl-4">+ Agregar ingrediente</button>
                </div>

                <button type="button" @click="addGroup" class="text-cyan-700 text-sm hover:underline">+ Agregar grupo</button>
                <p v-if="form.errors.ingredients" class="text-red-500 text-xs mt-1">{{ form.errors.ingredients }}</p>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Pasos de preparación *</label>
                <div v-for="(step, index) in form.steps" :key="index" class="flex gap-2 mb-2">
                    <span class="text-gray-500 text-sm pt-2">{{ index + 1 }}.</span>
                    <textarea v-model="form.steps[index]" rows="2" class="flex-1 border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-orange-400" />
                    <button type="button" @click="removeStep(index)" class="text-red-500 px-2">✕</button>
                </div>
                <button type="button" @click="addStep" class="text-cyan-700 text-sm hover:underline">+ Agregar paso</button>
                <p v-if="form.errors.steps" class="text-red-500 text-xs mt-1">{{ form.errors.steps }}</p>
            </div>
        </FormCard>
    </AdminLayout>
</template>

<script setup>
import AdminLayout from '@/Layouts/AdminLayout.vue';
import { useForm } from '@inertiajs/vue3';
import FormCard from '@/Components/FormCard.vue';
import FormInput from '@/Components/FormInput.vue';

const form = useForm({
    title: '',
    preparation_time: '',
    servings: '',
    image: null,
    ingredients: [{ title: '', items: [''] }],
    steps: [''],
});

function addGroup() { form.ingredients.push({ title: '', items: [''] }); }
function removeGroup(groupIndex) { form.ingredients.splice(groupIndex, 1); }
function addItem(groupIndex) { form.ingredients[groupIndex].items.push(''); }
function removeItem(groupIndex, itemIndex) { form.ingredients[groupIndex].items.splice(itemIndex, 1); }
function addStep() { form.steps.push(''); }
function removeStep(index) { form.steps.splice(index, 1); }

function submit() {
    form.post(route('admin.recipes.store'), {
        forceFormData: true,
    });
}
</script>