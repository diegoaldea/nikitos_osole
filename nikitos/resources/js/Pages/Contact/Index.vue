<template>
    <PublicLayout>
        <section class="relative h-[280px] md:h-[410px]">
            <img src="/images/img-contact.png" alt="Contacto" class="w-full h-full object-cover" />
            <div class="absolute inset-0 flex items-center justify-center">
                <h1 class="text-4xl md:text-6xl mt-3 font-bold text-white">Contacto</h1>
            </div>
        </section>

        <section class="py-11">
            <div class="mx-auto px-6 md:px-16 flex flex-col md:flex-row gap-6 md:gap-0">
                <!-- Tabs -->
                <div class="flex flex-col gap-4 pt-2 shrink-0 text-xl w-full md:w-1/3">
                    <button @click="activeTab = 'ventas'"
                        class="flex items-center gap-2 text-left"
                        :class="activeTab === 'ventas' ? 'text-orange-500' : 'text-gray-800'">
                        Ventas <span>›</span>
                    </button>
                    <button @click="activeTab = 'rrhh'"
                        class="flex items-center gap-2 text-left"
                        :class="activeTab === 'rrhh' ? 'text-orange-500' : 'text-gray-800'">
                        RRHH <span>›</span>
                    </button>
                </div>

                <!-- Ventas form -->
                <form v-if="activeTab === 'ventas'" @submit.prevent="submitSales" class="flex-1">
                    <div style="display: flex; flex-direction: column; gap: 2.25rem;">
                        <div class="flex flex-col md:flex-row gap-6 md:gap-8">
                            <div class="flex-1">
                                <label class="block text-base text-gray-500 mb-3">Razón social*</label>
                                <input v-model="salesForm.business_name" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-gray-900" />
                                <span v-if="salesErrors.business_name" class="text-red-500 text-xs">{{ salesErrors.business_name }}</span>
                            </div>
                            <div class="flex-1">
                                <label class="block text-base text-gray-500 mb-3">CUIT*</label>
                                <input v-model="salesForm.cuit" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-gray-900" />
                                <span v-if="salesErrors.cuit" class="text-red-500 text-xs">{{ salesErrors.cuit }}</span>
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row gap-6 md:gap-8">
                            <div class="flex-1">
                                <label class="block text-base text-gray-500 mb-3">Tipo de Negocio*</label>
                                <input v-model="salesForm.business_type" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-gray-900" />
                                <span v-if="salesErrors.business_type" class="text-red-500 text-xs">{{ salesErrors.business_type }}</span>
                            </div>
                            <div class="flex-1">
                                <label class="block text-base text-gray-500 mb-3">Trayectoria en el Mercado</label>
                                <input v-model="salesForm.market_experience" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-gray-900" />
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row gap-6 md:gap-8">
                            <div class="flex-1">
                                <label class="block text-base text-gray-500 mb-3">Dirección*</label>
                                <input v-model="salesForm.address" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-gray-900" />
                                <span v-if="salesErrors.address" class="text-red-500 text-xs">{{ salesErrors.address }}</span>
                            </div>
                            <div class="flex-1">
                                <label class="block text-base text-gray-500 mb-3">Localidad*</label>
                                <input v-model="salesForm.city" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-gray-900" />
                                <span v-if="salesErrors.city" class="text-red-500 text-xs">{{ salesErrors.city }}</span>
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row gap-6 md:gap-8">
                            <div class="flex-1">
                                <label class="block text-base text-gray-500 mb-3">Teléfono*</label>
                                <input v-model="salesForm.phone" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-gray-900" />
                                <span v-if="salesErrors.phone" class="text-red-500 text-xs">{{ salesErrors.phone }}</span>
                            </div>
                            <div class="flex-1">
                                <label class="block text-base text-gray-500 mb-3">Celular*</label>
                                <input v-model="salesForm.mobile" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-gray-900" />
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row gap-6 md:gap-8">
                            <div class="flex-1">
                                <label class="block text-base text-gray-500 mb-3">Horario de atención*</label>
                                <input v-model="salesForm.business_hours" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-gray-900" />
                                <span v-if="salesErrors.business_hours" class="text-red-500 text-xs">{{ salesErrors.business_hours }}</span>
                            </div>
                            <div class="flex-1">
                                <label class="block text-base text-gray-500 mb-3">Email*</label>
                                <input v-model="salesForm.email" type="email" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-gray-900" />
                                <span v-if="salesErrors.email" class="text-red-500 text-xs">{{ salesErrors.email }}</span>
                            </div>
                        </div>
                        <div>
                            <label class="block text-base text-gray-500 mb-3">Observaciones *</label>
                            <textarea v-model="salesForm.observations" rows="5" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-gray-900 resize-none"></textarea>
                        </div>
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <span class="text-base text-gray-500">*Campos obligatorios</span>
                        <button type="submit" class="border border-orange-400 text-orange-500 px-16 py-2 rounded-full transition-all duration-300 hover:bg-orange-500 hover:text-white">
                            Enviar consulta
                        </button>
                    </div>
                    <div v-if="salesSuccess" class="mt-4 text-green-600 font-medium">{{ salesSuccess }}</div>
                </form>

                <!-- RRHH form -->
                <form v-if="activeTab === 'rrhh'" @submit.prevent="submitJob" class="flex-1">
                    <div style="display: flex; flex-direction: column; gap: 1.95rem;">
                        <div class="flex flex-col md:flex-row gap-6 md:gap-8">
                            <div class="flex-1">
                                <label class="block text-base text-gray-500 mb-3">Nombre y apellido*</label>
                                <input v-model="jobForm.name" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-gray-900" />
                                <span v-if="jobErrors.name" class="text-red-500 text-xs">{{ jobErrors.name }}</span>
                            </div>
                            <div class="flex-1">
                                <label class="block text-base text-gray-500 mb-3">Sexo*</label>
                                <input v-model="jobForm.gender" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-gray-900" />
                                <span v-if="jobErrors.gender" class="text-red-500 text-xs">{{ jobErrors.gender }}</span>
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row gap-6 md:gap-8">
                            <div class="flex-1">
                                <label class="block text-base text-gray-500 mb-3">DNI*</label>
                                <input v-model="jobForm.dni" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-gray-900" />
                                <span v-if="jobErrors.dni" class="text-red-500 text-xs">{{ jobErrors.dni }}</span>
                            </div>
                            <div class="flex-1">
                                <label class="block text-base text-gray-500 mb-3">Fecha de nacimiento*</label>
                                <input v-model="jobForm.birth_date" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-gray-900" />
                                <span v-if="jobErrors.birth_date" class="text-red-500 text-xs">{{ jobErrors.birth_date }}</span>
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row gap-6 md:gap-8">
                            <div class="flex-1">
                                <label class="block text-base text-gray-500 mb-3">Dirección*</label>
                                <input v-model="jobForm.address" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-gray-900" />
                                <span v-if="jobErrors.address" class="text-red-500 text-xs">{{ jobErrors.address }}</span>
                            </div>
                            <div class="flex-1">
                                <label class="block text-base text-gray-500 mb-3">Localidad*</label>
                                <input v-model="jobForm.city" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-gray-900" />
                                <span v-if="jobErrors.city" class="text-red-500 text-xs">{{ jobErrors.city }}</span>
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row gap-6 md:gap-8">
                            <div class="flex-1">
                                <label class="block text-base text-gray-500 mb-3">Teléfono*</label>
                                <input v-model="jobForm.phone" type="text" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-gray-900" />
                                <span v-if="jobErrors.phone" class="text-red-500 text-xs">{{ jobErrors.phone }}</span>
                            </div>
                            <div class="flex-1">
                                <label class="block text-base text-gray-500 mb-3">Email</label>
                                <input v-model="jobForm.email" type="email" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-gray-900" />
                            </div>
                        </div>
                        <div class="flex flex-col md:flex-row gap-6 md:gap-8">
                            <div class="flex-1">
                                <label class="block text-base text-gray-500 mb-3">Puesto al que aspira*</label>
                                <select v-model="jobForm.position" class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:border-gray-900 bg-white">
                                    <option value="" disabled></option>
                                    <option>Envasado</option>
                                    <option>Producción</option>
                                    <option>Administración</option>
                                    <option>Control de Calidad</option>
                                    <option>Ventas</option>
                                    <option>Recursos Humanos</option>
                                    <option>Otros</option>
                                </select>
                                <span v-if="jobErrors.position" class="text-red-500 text-xs">{{ jobErrors.position }}</span>
                            </div>
                            <div class="flex-1">
                                <label class="block text-base text-gray-500 mb-3">Subir CV</label>
                                <label class="flex items-center justify-between w-full border border-gray-300 rounded px-3 py-2 cursor-pointer hover:border-gray-400">
                                    <span class="text-gray-400 text-base">{{ cvFileName || 'Adjuntar archivo' }}</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-orange-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v2a2 2 0 002 2h12a2 2 0 002-2v-2M12 12V4m0 0L8 8m4-4l4 4" />
                                    </svg>
                                    <input @change="handleCv" type="file" accept=".pdf,.doc,.docx" class="hidden" />
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center justify-between mt-6">
                        <span class="text-sm text-gray-500">*Campos obligatorios</span>
                        <button type="submit" class="border border-orange-400 text-orange-500 px-16 py-2 rounded-full transition-all duration-300 hover:bg-orange-500 hover:text-white">
                            Enviar solicitud
                        </button>
                    </div>
                    <div v-if="jobSuccess" class="mt-4 text-green-600 font-medium">{{ jobSuccess }}</div>
                </form>
            </div>
        </section>

        <section class="py-12">
            <div class="mx-auto px-6 md:px-16 flex flex-col md:flex-row gap-8 md:gap-12">
                <div class="w-full md:w-auto" style="flex: 0 0 32%;">
                    <h3 class="text-xl font-bold text-gray-900 mb-6 text-center md:text-left">Datos de contacto</h3>
                    <div class="flex flex-col gap-5 text-gray-600">
                        <p class="flex items-start gap-3">
                            <MapPin class="w-5 h-5 shrink-0 mt-0.5 text-orange-400" />
                            Av. Otero 4550, Pontevedra, Provincia de Buenos Aires
                        </p>
                        <p class="flex items-center gap-3">
                            <Phone class="w-5 h-5 shrink-0 text-orange-400" />
                            +54 220 492-4752
                        </p>
                        <p class="flex items-center gap-3">
                            <Mail class="w-5 h-5 shrink-0 text-orange-400" />
                            ventas@nikitos.com.ar
                        </p>
                        <p class="flex items-center gap-3">
                            <Clock class="w-5 h-5 shrink-0 text-orange-400" />
                            Lunes a Viernes 9.00 a 17:30hs
                        </p>
                    </div>
                </div>

                <div ref="mapContainer" class="flex-1 h-[500px] z-0" style="min-height: 380px;"></div>
            </div>
        </section>
    </PublicLayout>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import { useForm, usePage } from '@inertiajs/vue3';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import { MapPin, Phone, Mail, Clock } from '@lucide/vue';
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';

const activeTab = ref('ventas');
const mapContainer = ref(null);

onMounted(() => {
    const map = L.map(mapContainer.value, {
        center: [-34.74570780290821, -58.6889873],
        zoom: 15,
    });

    L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> &copy; <a href="https://carto.com/">CARTO</a>',
    }).addTo(map);

    const nikitosIcon = L.divIcon({
        className: '',
        html: `
            <div style="width:40px;height:40px;background:#fa9c1e;border-radius:50% 50% 50% 0;transform:rotate(-45deg);box-shadow:0 0 10px rgba(0,0,0,0.5);display:flex;align-items:center;justify-content:center;">
                <div style="width:30px;height:30px;background:white;border-radius:50%;display:flex;align-items:center;justify-content:center;transform:rotate(45deg);">
                    <img src="/images/logo.png" style="width:24px;height:24px;object-fit:contain;" />
                </div>
            </div>
        `,
        iconSize: [40, 40],
        iconAnchor: [20, 40],
        popupAnchor: [0, -45],
    });

    L.marker([-34.74570780290821, -58.6889873], { icon: nikitosIcon })
        .addTo(map)
        .bindPopup('<strong>Nikitos Snacks</strong><br>Av. Otero 4550, Pontevedra');
});

const salesForm = useForm({
    business_name: '',
    cuit: '',
    business_type: '',
    market_experience: '',
    address: '',
    city: '',
    phone: '',
    mobile: '',
    business_hours: '',
    email: '',
    observations: '',
});

const salesErrors = ref({});
const salesSuccess = ref('');

function submitSales() {
    salesForm.post(route('contact.sales'), {
        onSuccess: () => {
            salesSuccess.value = 'Mensaje enviado correctamente.';
            salesForm.reset();
        },
        onError: (errors) => {
            salesErrors.value = errors;
        },
    });
}

const jobForm = useForm({
    name: '',
    gender: '',
    dni: '',
    birth_date: '',
    address: '',
    city: '',
    phone: '',
    email: '',
    position: '',
    cv_path: null,
});

const jobErrors = ref({});
const jobSuccess = ref('');
const cvFileName = ref('');

function handleCv(e) {
    const file = e.target.files[0];
    jobForm.cv_path = file;
    cvFileName.value = file ? file.name : '';
}

function submitJob() {
    jobForm.post(route('contact.job'), {
        forceFormData: true,
        onSuccess: () => {
            jobSuccess.value = 'Solicitud enviada correctamente.';
            jobForm.reset();
        },
        onError: (errors) => {
            jobErrors.value = errors;
        },
    });
}
</script>

<style scoped>
input:focus,
textarea:focus,
select:focus {
    outline: none !important;
    box-shadow: 0 0 0 1.5px #111827;
}
</style>
