<script setup>
import { onBeforeMount, ref, watch } from 'vue';
import axios from 'axios';

const brands = ref([]);
const models = ref([]);
const years = ref([]);
const bodies = ref([]);
const doors = ref([]);
const generations = ref([]);
const engineTypes = ref([]);
const drives = ref([]);
const transmissions = ref([]);
const modifications = ref([]);
const complectations = ref([]);
const rudders = ref([]);

const brand = ref();
const model = ref();
const year = ref();
const body = ref();
const door = ref();
const generation = ref();
const engineType = ref();
const drive = ref();
const transmission = ref();
const modification = ref();
const complectation = ref();
const rudder = ref();

watch(brand, () => {
    axios
        .get(`/brands/${brand.value}/models`)
        .then(({data}) => {
            models.value = data.brand.models;
        });
});

watch(model, () => {
    axios
        .get(`/brands/${brand.value}/models/${model.value}/years`)
        .then(({data}) => {
            years.value = data.years;
        });
});

watch(year, () => {
    axios
        .get(`/brands/${brand.value}/models/${model.value}/years/${year.value}/bodies`)
        .then(({data}) => {
            bodies.value = data.bodies;
        });
});

watch(body, () => {
    axios
        .get(`/brands/${brand.value}/models/${model.value}/years/${year.value}/bodies/${body.value}/doors`)
        .then(({data}) => {
            doors.value = data.doors;
        });
});

watch(door, () => {
    axios
        .get(`/brands/${brand.value}/models/${model.value}/years/${year.value}/bodies/${body.value}/doors/${door.value}/generations`)
        .then(({data}) => {
            generations.value = data.generations;
        });
});

watch(generation, () => {
    axios
        .get(`/brands/${brand.value}/models/${model.value}/years/${year.value}/bodies/${body.value}/doors/${door.value}/generations/${generation.value}/engines`)
        .then(({data}) => {
            engineTypes.value = data.engineTypes;
        });
});

watch(engineType, () => {
    axios
        .get(`/brands/${brand.value}/models/${model.value}
            /years/${year.value}/bodies/${body.value}/doors/${door.value}
            /generations/${generation.value}/engines/${engineType.value}
            /drives`)
        .then(({data}) => {
            drives.value = data.drives;
        });
});

watch(drive, () => {
    axios
        .get(`/brands/${brand.value}/models/${model.value}/years/${year.value}/bodies/${body.value}/doors/${door.value}/generations/${generation.value}/engines/${engineType.value}/drives/${drive.value}/transmissions`)
        .then(({data}) => {
            transmissions.value = data.transmissions;
        });
});

watch(transmission, () => {
    axios
        .get(`/brands/${brand.value}/models/${model.value}/years/${year.value}/bodies/${body.value}/doors/${door.value}/generations/${generation.value}/engines/${engineType.value}/drives/${drive.value}/transmissions/${transmission.value}/modifications`)
        .then(({data}) => {
            modifications.value = data.modifications;
        });
});

watch(modification, () => {
    axios
        .get(`/brands/${brand.value}/models/${model.value}/years/${year.value}/bodies/${body.value}/doors/${door.value}/generations/${generation.value}/engines/${engineType.value}/drives/${drive.value}/transmissions/${transmission.value}/modifications/${modification.value}/equipments`)
        .then(({data}) => {
            complectations.value = data.complectations;
        });
});

watch(complectation, () => {
    axios
        .get(`/brands/${brand.value}/models/${model.value}/rudders`)
        .then(({data}) => {
            rudders.value = data.rudders;
        });
});

onBeforeMount(() => {
    axios
        .get('/brands')
        .then(({data}) => {
            brands.value = data.brands;
        });
});
</script>

<template>
    <div style="display: flex; gap: 20px; flex-direction: column">
        <div
            class="group"
            style="display: flex; gap: 10px;"
        >
            <span>Brand</span>
            <select
                v-model="brand"
                name=""
                id=""
            >
                <option
                    v-for="brand in brands"
                    :value="brand.id"
                    :key="brand.id"
                >
                    {{ brand.name }}
                </option>
            </select>
            <button>remove</button>
        </div>
        <div
            v-if="brand"
            class="group"
            style="display: flex; gap: 10px;"
        >
            <span>Model</span>
            <select
                v-model="model"
                name=""
                id=""
            >
                <option
                    v-for="model in models"
                    :key="model.id"
                    :value="model.id"
                >
                    {{model.name}}
                </option>
            </select>
            <button>remove</button>
        </div>
        <div
            v-if="model"
            class="group"
            style="display: flex; gap: 10px;"
        >
            <span>Year of release</span>
            <select
                v-model="year"
                name=""
                id=""
            >
                <option
                    v-for="year in years"
                    :key="year.id"
                    :value="year.id"
                >
                    {{year.name}}
                </option>
            </select>
            <button>remove</button>
        </div>
        <div
            v-if="year"
            class="group"
            style="display: flex; gap: 10px;"
        >
            <span>Body type</span>
            <select
                v-model="body"
                name=""
                id=""
            >
                <option
                    v-for="body in bodies"
                    :key="body.id"
                    :value="body.id"
                >
                    {{body.name}}
                </option>
            </select>
            <button>remove</button>
        </div>
        <div
            v-if="body"
            class="group"
            style="display: flex; gap: 10px;"
        >
            <span>Door quantity</span>
            <select
                v-model="door"
                name=""
                id=""
            >
                <option
                    v-for="door in doors"
                    :key="door.id"
                    :value="door.id"
                >
                    {{door.name}}
                </option>
            </select>
            <button>remove</button>
        </div>
        <div
            v-if="body"
            class="group"
            style="display: flex; gap: 10px;"
        >
            <span>Generation</span>
            <select
                v-model="generation"
                name=""
                id=""
            >
                <option
                    v-for="generation in generations"
                    :key="generation.id"
                    :value="generation.id"
                >
                    {{generation.name}}
                </option>
            </select>
            <button>remove</button>
        </div>
        <div
            v-if="body"
            class="group"
            style="display: flex; gap: 10px;"
        >
            <span>Engine type</span>
            <select
                v-model="engineType"
                name=""
                id=""
            >
                <option
                    v-for="engine in engineTypes"
                    :key="engine.id"
                    :value="engine.id"
                >
                    {{engine.name}}
                </option>
            </select>
            <button>remove</button>
        </div>
        <div
            v-if="engineType"
            class="group"
            style="display: flex; gap: 10px;"
        >
            <span>Drive</span>
            <select
                v-model="drive"
                name=""
                id=""
            >
                <option
                    v-for="drive in drives"
                    :key="drive.id"
                    :value="drive.id"
                >
                    {{ drive.name }}
                </option>
            </select>
            <button>remove</button>
        </div>
        <div
            v-if="drive"
            class="group"
            style="display: flex; gap: 10px;"
        >
            <span>Transmission</span>
            <select
                v-model="transmission"
                name=""
                id=""
            >
                <option
                    v-for="transmission in transmissions"
                    :key="transmission.id"
                    :value="transmission.id"
                >
                    {{transmission.name}}
                </option>
            </select>
            <button>remove</button>
        </div>
        <div
            v-if="transmission"
            class="group"
            style="display: flex; gap: 10px;"
        >
            <span>Modification</span>
            <select
                v-model="modification"
                name=""
                id=""
            >
                <option
                    v-for="modification in modifications"
                    :key="modification.id"
                    :value="modification.id"
                >
                    {{modification.name}}
                </option>
            </select>
            <button>remove</button>
        </div>
        <div
            v-if="modification"
            class="group"
            style="display: flex; gap: 10px;"
        >
            <span>Complectation</span>
            <select
                v-model="complectation"
                name=""
                id=""
            >
                <option
                    v-for="complectation in complectations"
                    :key="complectation.id"
                    :value="complectation.id"
                >
                    {{complectation.name}}
                </option>
            </select>
            <button>remove</button>
        </div>
        <div
            v-if="complectation"
            class="group"
            style="display: flex; gap: 10px;"
        >
            <span>Rudder</span>
            <select
                v-model="rudder"
                name=""
                id=""
            >
                <option
                    v-for="rudder in rudders"
                    :key="rudder.id"
                    :value="rudder.id"
                >
                    {{rudder.name}}
                </option>
            </select>
            <button>remove</button>
        </div>
    </div>
</template>

<style scoped>

</style>
