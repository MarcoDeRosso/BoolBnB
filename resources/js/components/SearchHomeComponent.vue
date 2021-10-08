<template>
    <div>
        <div class="container">
            <div class="form-group">
                <label for="city">Città:</label>
                <input @keyup="filterSearch()"  type="text" id="city" name="city" v-model="city">
            </div>

            <div class="form-group">
                <label for="rooms_num">Numero di camere:</label>
                <input @click="filterSearch()" type="number" min="5" max="8" v-model="rooms">
            </div>

            <div class="form-group">
                <label for="beds_num">Numero di posti letto:</label>
                <input @click="filterSearch()"  type="number" min="1" max="3" v-model="beds">
            </div>

            <label for="distance">Raggio della ricera(0-20km):</label>
            <input type="range" min="0" max="20" v-model="distance">       

            <label for="services">Servizi aggiuntivi:</label>
            <select name="services" id="services" v-model="service">
                <option v-for="service in services" :key="service.id" :value="`${service.id}`">{{ service.title }}</option>               
            </select>
        </div>
        <div class="container">
            <!-- <apartment v-bind:filtederApartments='filtederApartments'></apartment> -->
            <div v-for="(apa,index) in filteredApartments" :key="index">
                <h1> {{ apa.title }} </h1>

            </div>
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
                rooms: 0,
                beds: 0,
                distance: 0,
                service: '',
                filteredApartments: []
            }
        },
        methods: {
            filterSearch() {
                this.filteredApartments = this.apartments.filter((apa)=>{
                    return apa.rooms_num == this.rooms
                })
                this.filteredApartments = this.filteredApartments.filter((apa)=>{
                    return apa.beds_num == this.beds
                })
                if(this.city.trim() != '') {
                    
                    this.filteredApartments = this.filteredApartments.filter((apa)=>{
                        return apa.address.toLowerCase().includes(this.city.toLowerCase().trim())                        
                    })
                }
            },
        }
    }
</script>