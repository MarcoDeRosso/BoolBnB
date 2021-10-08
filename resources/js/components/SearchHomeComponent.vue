<template>
    <div>
        <div class="container">
            <div class="form-group">
                <label for="city">Città:</label>
                <input type="text" id="city" name="city" v-model="city">
            </div>

            <div class="form-group">
                <label for="rooms_num">Numero di camere:</label>
                <input type="number" id="rooms_num" name="rooms_num" min="1" max="15" v-model="rooms_num">
            </div>

            <div class="form-group">
                <label for="beds_num">Numero di posti letto:</label>
                <input type="number" id="beds_num" name="beds_num" min="1" max="10" v-model="beds_num">
            </div>

            <label for="distance">Raggio della ricera(0-20km):</label>
            <input type="range" id="distance" name="distance" min="0" max="20" v-model="distance">       

            <label for="services">Servizi aggiuntivi:</label>
            <select name="services" id="services" v-model="service">
                <option v-for="service in services" :key="service.id" :value="`${service.id}`">{{ service.title }}</option>               
            </select>
        </div>
        <div class="container">
            <apartment v-bind:filtederApartments='filtederApartments'></apartment>
            <!-- <div v-for="(service,index) in listSrvApps" :key="index">
                

            </div> -->
        </div>
    </div>
</template>

<script>
import CardApartment from './CardApartment.vue';

    export default {
        components: {
            CardApartment
        },
        props:['services','apartments', 'lista'],
        mounted() {
            console.log('Component mounted.')
        },
        data () {
            return {
                city:'',
                rooms_num: 0,
                beds_num: 0,
                distance: 0,
                service: '',
                filtederApartments: []
            }
        },
        methods: {

        }
    }
</script>