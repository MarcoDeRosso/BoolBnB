<template>
<div>
    <div class="container-fluid jumbotron login">
        <div class="container login">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">Ricerca Avanzata</div>

                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="city">Città:</label>
                                <div class="col-md-4">
                                    <input @keyup="filterSearch()"  type="text" id="city" name="city" v-model="city">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="rooms_num">Numero di camere:</label>
                                <div class="col-2">
                                    <input @click="filterSearch()" type="number" min="5" max="8" v-model="rooms">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="beds_num">Numero di posti letto:</label>
                                <div class="col-2">
                                    <input @click="filterSearch()"  type="number" min="1" max="3" v-model="beds">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="distance">Raggio della ricera(0-20km):</label>
                                <div class="col-2">
                                    <input class="no-box-shadow" type="range" min="0" max="20" v-model="distance">       
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="services">Servizi aggiuntivi:</label>
                                <div class="col-2">
                                    <select name="services" id="services" v-model="service">
                                        <option v-for="service in services" :key="service.id" :value="`${service.id}`">{{ service.title }}</option>               
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <apartment v-bind:filtederApartments='filtederApartments'></apartment>
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