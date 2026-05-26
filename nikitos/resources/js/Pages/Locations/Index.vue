<template>
    <PublicLayout>
        <section class="relative h-[280px] md:h-[410px]">
            <img src="/images/img-locations.png" alt="Donde comprar" class="w-full h-full object-cover object-bottom" />
            <div class="absolute inset-0 flex items-center justify-center">
                <h1 class="text-4xl md:text-6xl mt-3 font-bold text-white">Donde comprar</h1>
            </div>
        </section>

        <section class="py-12">
            <div class="max-w-[1224px] mx-auto px-4">
                <div class="flex flex-col md:flex-row gap-7">
                    <div class="w-full md:w-[380px] shrink-0 bg-white rounded-xl shadow-md p-5">
                        <select v-model="selectedProvince" class="w-full border border-black rounded px-3 py-2 mb-5 text-gray-700 focus:outline-none text-sm">
                            <option value="">Provincia</option>
                            <option v-for="province in provinces" :key="province" :value="province">{{ province }}</option>
                        </select>

                        <div class="overflow-y-auto max-h-[500px] border-t border-black">
                            <div
                                v-for="location in filteredLocations"
                                :key="location.id"
                                class="py-4 border-b border-black cursor-pointer px-2 transition-colors duration-150"
                                :class="selectedLocation?.id === location.id ? 'bg-orange-100' : 'hover:bg-orange-100'"
                                @click="selectLocation(location)"
                            >
                                <p v-if="!selectedProvince" class="text-sm text-orange-500 font-medium">{{ location.province }}</p>
                                <p class="text-base font-bold text-gray-800 uppercase">{{ location.city }}</p>
                            </div>
                        </div>
                    </div>

                    <div ref="mapContainer" class="flex-1 rounded-xl min-h-[560px] z-0"></div>
                </div>
            </div>
        </section>
    </PublicLayout>
</template>

<script setup>
import { ref, computed, onMounted, watch } from 'vue';
import PublicLayout from '@/Layouts/PublicLayout.vue';
import L from 'leaflet';
import 'leaflet/dist/leaflet.css';

const props = defineProps({
    locations: Array,
});

const selectedProvince = ref('');
const selectedLocation = ref(null);
const mapContainer = ref(null);
let map = null;
let markers = [];
let markerMap = new Map();

const provinces = computed(() => {
    return [...new Set(props.locations.map(l => l.province))].sort();
});

const filteredLocations = computed(() => {
    if (!selectedProvince.value) return props.locations;
    return props.locations.filter(l => l.province === selectedProvince.value);
});

const nikitosIcon = L.divIcon({
    className: '',
    html: `
        <div style="
            width: 40px; height: 40px;
            background: #fa9c1e;
            border-radius: 50% 50% 50% 0;
            transform: rotate(-45deg);
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
            display: flex; align-items: center; justify-content: center;
        ">
            <div style="
                width: 30px; height: 30px;
                background: white;
                border-radius: 50%;
                display: flex; align-items: center; justify-content: center;
                transform: rotate(45deg);
            ">
                <img src="/images/logo.png" alt="Nikitos" style="
                    width: 24px; height: 24px;
                    object-fit: contain;
                " />
            </div>
        </div>
    `,
    iconSize: [40, 40],
    iconAnchor: [20, 40],
    popupAnchor: [0, -45],
});

function updateMarkers() {
    markers.forEach(m => m.remove());
    markers = [];
    markerMap.clear();

    filteredLocations.value.forEach(location => {
        if (location.latitude && location.longitude) {
            const marker = L.marker([location.latitude, location.longitude], { icon: nikitosIcon })
                .addTo(map)
                .bindPopup(`<strong>${location.city}</strong><br>${location.province}`);
            markers.push(marker);
            markerMap.set(location.id, marker);
        }
    });

    if (markers.length > 0) {
        const group = L.featureGroup(markers);
        map.fitBounds(group.getBounds().pad(0.1));
    }
}

function selectLocation(location) {
    selectedLocation.value = location;
    const marker = markerMap.get(location.id);
    if (marker) {
        map.setView([location.latitude, location.longitude], 14);
        marker.openPopup();
    }
}

onMounted(() => {
    map = L.map(mapContainer.value, {
        center: [-38, -63],
        zoom: 4,
    });

    L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> &copy; <a href="https://carto.com/">CARTO</a>',
    }).addTo(map);

    updateMarkers();
});

watch(filteredLocations, () => {
    updateMarkers();
});
</script>
