<template>
    <div class="bg-white min-h-screen flex flex-col">
        <nav class="bg-white shadow-md w-full mx-auto fixed max-w-[1224px] top-0 sm:top-[21px] left-0 right-0 z-50 rounded-none sm:rounded-lg">
            <div class="container mx-auto px-14 py-2 flex flex-wrap items-center justify-between h-[99px]">
                <Link :href="route('home')">
                    <img src="/images/logo.png" alt="Nikitos" class="h-17" />
                </Link>

                <!-- Desktop links -->
                <div class="hidden md:flex items-center text-gray-900 gap-6">
                    <Link :href="route('home')" class="hover:text-orange-500" :class="route().current('home') ? 'font-bold' : 'font-normal'">Home</Link>
                    <Link :href="route('products.index')" class="hover:text-orange-500" :class="route().current('products.*') ? 'font-bold' : 'font-normal'">Productos</Link>
                    <Link :href="route('locations.index')" class="hover:text-orange-500" :class="route().current('locations.*') ? 'font-bold' : 'font-normal'">Donde comprar</Link>
                    <Link :href="route('recipes.index')" class="hover:text-orange-500" :class="route().current('recipes.*') ? 'font-bold' : 'font-normal'">Recetas</Link>
                    <Link :href="route('about.index')" class="hover:text-orange-500" :class="route().current('about.*') ? 'font-bold' : 'font-normal'">Nosotros</Link>
                    <Link :href="route('contact.index')" class="hover:text-orange-500" :class="route().current('contact.*') ? 'font-bold' : 'font-normal'">Contacto</Link>
                </div>

                <!-- Desktop login -->
                <Link :href="route('login')" class="hidden md:flex bg-orange-400 text-white px-6 py-2 rounded-full hover:bg-orange-600 items-center gap-2">
                    Ingresar
                    <Lock class="w-4 h-4" />
                </Link>

                <!-- Hamburger button -->
                <button @click="mobileMenuOpen = true" class="md:hidden text-gray-900">
                    <Menu class="w-7 h-7" />
                </button>
            </div>
        </nav>

        <!-- Mobile menu overlay -->
        <div v-if="mobileMenuOpen" class="fixed inset-0 z-[100]">
            <!-- Backdrop -->
            <div class="absolute inset-0 bg-black bg-opacity-30" @click="mobileMenuOpen = false"></div>

            <!-- Panel -->
            <Transition name="slide" appear>
                <div class="absolute top-0 left-0 h-full bg-white w-72 flex flex-col px-8 py-8 shadow-xl">
                    <button @click="mobileMenuOpen = false" class="self-end mb-6 text-gray-700">
                        <X class="w-6 h-6" />
                    </button>
                    <div class="flex flex-col gap-6 text-gray-900 text-lg flex-1">
                        <Link :href="route('home')" @click="mobileMenuOpen = false" :class="route().current('home') ? 'font-bold' : 'font-normal'">Home</Link>
                        <Link :href="route('products.index')" @click="mobileMenuOpen = false" :class="route().current('products.*') ? 'font-bold' : 'font-normal'">Productos</Link>
                        <Link :href="route('locations.index')" @click="mobileMenuOpen = false" :class="route().current('locations.*') ? 'font-bold' : 'font-normal'">Donde comprar</Link>
                        <Link :href="route('recipes.index')" @click="mobileMenuOpen = false" :class="route().current('recipes.*') ? 'font-bold' : 'font-normal'">Recetas</Link>
                        <Link :href="route('about.index')" @click="mobileMenuOpen = false" :class="route().current('about.*') ? 'font-bold' : 'font-normal'">Nosotros</Link>
                        <Link :href="route('contact.index')" @click="mobileMenuOpen = false" :class="route().current('contact.*') ? 'font-bold' : 'font-normal'">Contacto</Link>
                    </div>
                    <Link :href="route('login')" class="bg-orange-400 text-white px-6 py-2 rounded-full hover:bg-orange-600 flex items-center gap-2 w-fit">
                        Ingresar
                        <Lock class="w-4 h-4" />
                    </Link>
                </div>
            </Transition>
        </div>

        <main class="flex-1">
            <slot />
        </main>

        <footer class="relative text-white mt-10 sm:mt-64">
            <div class="absolute -bottom-0 w-full h-[520px] sm:h-[418px] footer-bg-img">
                <img src="/images/img-footer.png" alt="" class="w-full h-full object-center" />
            </div>

            <div class="max-w-[1340px] mx-auto py-8 relative z-10 bottom-0 lg:bottom-10 footer-inner">
                <div class="flex flex-col sm:flex-row items-center justify-between px-14">
                    <div class="flex flex-col">
                        <img src="/images/logo.png" alt="Nikitos" class="h-15 w-fit" />
                        <div class="flex gap-4 ml-10">
                            <a href="#" class="hover:opacity-80">
                                <svg class="w-6 h-6" fill="white" viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                            </a>
                            <a href="#" class="hover:opacity-80">
                                <svg class="w-6 h-6" fill="none" stroke="white" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                            </a>
                        </div>
                    </div>

                    <div class="hidden md:block">
                        <h3 class="font-bold text-lg mb-4">Secciones</h3>
                        <div class="grid grid-cols-2 gap-2">
                            <div class="flex flex-col gap-3">
                                <Link :href="route('home')" class="hover:opacity-80">Home</Link>
                                <Link :href="route('recipes.index')" class="hover:opacity-80">Recetas</Link>
                                <Link :href="route('products.index')" class="hover:opacity-80">Productos</Link>
                                <a href="#" class="hover:opacity-80">RSE</a>
                            </div>
                            <div class="flex flex-col gap-3">
                                <Link :href="route('about.index')" class="hover:opacity-80">Nosotros</Link>
                                <Link :href="route('locations.index')" class="hover:opacity-80">Donde comprar</Link>
                                <Link :href="route('contact.index')" class="hover:opacity-80">Contacto</Link>
                                <a href="#" class="hover:opacity-80">Políticas de calidad</a>
                            </div>
                        </div>
                    </div>

                    <div class="text-center md:text-left" style="margin-top: 2rem;">
                        <h3 class="font-bold text-lg mb-2">Suscribite al Newsletter</h3>
                        <div class="flex border border-white rounded-lg overflow-hidden bg-white">
                            <input type="email" placeholder="Email" class="flex-1 px-4 py-2 text-gray-800 outline-none border-none ring-0 bg-transparent focus:ring-0 focus:border-none" />
                            <button class="px-4 py-2 text-orange-500 hover:bg-gray-50 flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="contact-section" style="margin-top: 2rem;">
                        <h3 class="font-bold text-lg mb-4 text-center md:text-left">Contacto</h3>
                        <div class="flex flex-col gap-4 text-base">
                            <p class="flex items-start gap-2">
                                <MapPin class="w-5 h-5 shrink-0 mt-0.5" />
                                Av. Otero 4550, Pontevedra, Provincia de Buenos Aires
                            </p>
                            <p class="flex items-center gap-2">
                                <Phone class="w-5 h-5 shrink-0" />
                                +54 220 492-4752
                            </p>
                            <p class="flex items-center gap-2">
                                <Mail class="w-5 h-5 shrink-0" />
                                ventas@nikitos.com.ar
                            </p>
                            <p class="flex items-center gap-2">
                                <Clock class="w-5 h-5 shrink-0" />
                                Lunes a Viernes 9.00 a 17:30hs
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full absolute bg-orange-400 py-4 flex flex-col-reverse md:flex-row justify-between items-center z-50">
                <p class="text-center text-sm px-14">© Copyright 2025 Nikitos Snacks. Todos los derechos reservados.</p>
                <a href="https://osole.com.ar" target="_blank" class="text-sm px-14 hover:opacity-80">by Osole</a>
            </div>
        </footer>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { Link } from '@inertiajs/vue3';
import { MapPin, Phone, Mail, Clock, Lock, Menu, X } from '@lucide/vue';

const mobileMenuOpen = ref(false);
</script>

<style scoped>
.contact-section {
    width: 90vw;
}
@media (min-width: 640px) {
    .contact-section {
        width: auto;
        max-width: 320px;
    }
}

@media (max-width: 639px) {
    footer::after {
        content: '';
        position: absolute;
        top: 520px;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #F29109;
        z-index: 0;
    }
    .footer-bg-img {
        top: 0;
        bottom: auto;
    }
    .footer-inner {
        padding-top: 130px;
    }
}

.slide-enter-active,
.slide-leave-active {
    transition: transform 0.3s ease;
}
.slide-enter-from,
.slide-leave-to {
    transform: translateX(-100%);
}
.slide-enter-to,
.slide-leave-from {
    transform: translateX(0);
}
</style>