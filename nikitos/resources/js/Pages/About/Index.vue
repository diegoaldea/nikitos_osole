<template>
    <PublicLayout>
        <section class="relative h-[280px] md:h-[410px]">
            <img :src="aboutImage('about_hero_image', '/images/img-about-us.png')" alt="Nosotros" class="w-full h-full object-cover" />
            <div class="absolute inset-0 flex items-center justify-center">
                <h1 class="text-4xl md:text-6xl mt-3 font-bold text-white">Nosotros</h1>
            </div>
        </section>

        <section class="bg-white pt-14">
            <!-- Primera sección full-width fuera del contenedor -->
            <AboutSection title="¿Quiénes somos?" :image="aboutImage('about_1_image', '/images/about-1.png')" :imageRight="true" :fullWidthImage="true">
                <p class="font-bold text-gray-800 leading-relaxed mb-4 text-lg">Nikitos se encuentra presente en el mercado local desde hace 40 años.</p>
                <p class="text-gray-600 leading-relaxed mb-4 text-lg">Actualmente cuenta con un amplio portfolio de snacks, tales como Pizzitos, Palitos salados, Maikitos de Queso, Papas Fritas, Cereales, Pochoclos Acaramelados, Bolitas/Aritos dulces, y Jugos para Congelar. El objetivo es llegar a los consumidores con ingredientes naturales y más saludables, contando con presencia de venta en todo el país y calidad de atención de excelencia.</p>
                <p class="text-gray-600 leading-relaxed text-lg">Trabajamos junto a nuestros colaboradores enérgicamente en la producción y desarrollo de nuevos productos creados específicamente para satisfacer los gustos y tendencias de los consumidores, para llegar a ser la compañía local de alimentos y bebidas, que sobresale por su calidad y precios bajos.</p>
            </AboutSection>

            <!-- Secciones normales dentro del contenedor -->
            <div class="mx-auto px-6 md:px-16">
                <AboutSection
                    title="Nuestra planta modelo"
                    description="Con una vocación de reinversión permanente en tecnología de punta y de mejora continua en los procesos productivos, trabajamos para superar nuestros propios estándares de productividad, con operaciones industriales que se desarrollan bajo un Sistema de Gestión Integral (SGI) diseñado por y para Nikitos, que contempla las características propias de la empresa y las bases de las distintas herramientas para la gestión implementadas en el mercado. Contamos con una Planta Industrial de 5500m2, en Buenos Aires, Argentina y otra en Montevideo, Uruguay."
                    :image="aboutImage('about_2_image', '/images/about-2.png')"
                    :imageRight="false"
                />
                <AboutSection
                    title="El equipo"
                    description="La integración sinérgica y creativa de los recursos y valores humanos representa el más importante capital en Nikitos. Nuestra filosofía corporativa es mantener un crecimiento sustentable al invertir en un futuro más saludable para la gente y para nuestro planeta."
                    :image="aboutImage('about_3_image', '/images/about-3.png')"
                    :imageRight="true"
                />
                <AboutSection
                    title="Nuestra flota"
                    description="Nuestro departamento de logística se especializa en realizar la distribución nacional de nuestros productos, contando con una Flota de Camiones, adecuados para su entrega en todo el territorio argentino."
                    :image="aboutImage('about_4_image', '/images/about-4.png')"
                    :imageRight="false"
                />
            </div>
        </section>
    </PublicLayout>
</template>

<script setup>
import PublicLayout from '@/Layouts/PublicLayout.vue';
import AboutSection from '@/Components/AboutSection.vue';

const props = defineProps({
    contents: Object,
});

function aboutImage(key, fallback) {
    return props.contents?.[key] ? `/storage/${props.contents[key]}` : fallback;
}
</script>
