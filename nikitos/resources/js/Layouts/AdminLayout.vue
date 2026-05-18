<template>
    <div class="min-h-screen bg-gray-100">
        <nav class="bg-white shadow px-6 py-4 flex justify-between items-center">
            <span class="font-bold text-lg text-orange-500">Nikitos Admin</span>
            <Link :href="route('profile.edit')" class="text-sm text-gray-600 hover:text-gray-900">
                {{ $page.props.auth.user.name }}
            </Link>
        </nav>

        <div class="flex">
            <aside class="w-64 min-h-screen bg-cyan-900 shadow p-4">
                <nav class="space-y-1 text-white">
                    <Link :href="route('admin.dashboard')" class="block px-4 py-2 rounded hover:bg-cyan-950">
                        Dashboard
                    </Link>
                    <Link :href="route('admin.categories.index')" class="block px-4 py-2 rounded hover:bg-cyan-950">
                        Categorías
                    </Link>
                    <Link :href="route('admin.products.index')" class="block px-4 py-2 rounded hover:bg-cyan-950">
                        Productos
                    </Link>
                    <Link :href="route('admin.recipes.index')" class="block px-4 py-2 rounded hover:bg-cyan-950">
                        Recetas
                    </Link>
                    <Link :href="route('admin.locations.index')" class="block px-4 py-2 rounded hover:bg-cyan-950">
                        Puntos de venta
                    </Link>
                    <Link :href="route('admin.sales-messages.index')" class="block px-4 py-2 rounded hover:bg-cyan-950">
                        Mensajes de ventas
                    </Link>
                    <Link :href="route('admin.job-applications.index')" class="block px-4 py-2 rounded hover:bg-cyan-950">
                        Postulaciones
                    </Link>
                    <Link :href="route('admin.site-contents.index')" class="block px-4 py-2 rounded hover:bg-cyan-950">
                        Contenidos del sitio
                    </Link>
                </nav>
            </aside>
            <main class="flex-1 p-8">
                <slot />
            </main>
        </div>
    </div>

</template>

<script setup>
import { Link } from '@inertiajs/vue3'
</script>