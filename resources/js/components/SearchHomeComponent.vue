<template>
<div>
    <!-- <div class="container-fluid jumbotron login"> -->
        <div class="container login">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">Ricerca per Città</div>

                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right" for="city">Città:</label>
                                <div class="col-md-4">
                                    <input class="box-shadow" @keyup="filterSearch()"  type="text" id="city" name="city" v-model="city">
                                </div>
                            </div>

                            <div v-show="city != ''">
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="rooms_num">Numero di camere:</label>
                                    <div class="col-2">
                                        <input class="box-shadow" @click="filterSearch()" type="number" min="5" max="8" v-model="rooms">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="beds_num">Numero di posti letto:</label>
                                    <div class="col-2">
                                        <input class="box-shadow" @click="filterSearch()"  type="number" min="1" max="3" v-model="beds">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="distance">Raggio della ricera(0-20km):</label>
                                    <div class="col-2 align-self-center">
                                        <input class="no-box-shadow" @change="postRange()" step="1" type="range" min="0" max="20" v-model="distance">       
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="col-6" v-for="service in services" :key="service.id" >
                                        <input @change="filterServices()"  id="`${service.title}`" type="checkbox" :value="`${service.id}`" v-model="serviceList">
                                        <label for="`${service.title}`">{{ service.title }}</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    <!-- </div> -->
    <div class="container">
        <!-- <apartment v-bind:filtederApartments='filtederApartments'></apartment> -->
        <div v-if="filteredApartments.length > 0">
            <div v-for="(apa,index) in filteredApartments" :key="index">
                <h1> {{ apa.title }} </h1>
            </div>
        </div>
        <div v-else>
            <h1>Nessun appartamento trovato</h1>
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
            this.addApartmentsToService()
        },
        data () {
            return {
                city:'',
                rooms: 0,
                beds: 0,
                distance: 0,
                serviceList: [],
                filteredApartments: [],
                apartmentsAndService:[],
                serviceListFlag : true,
                copyFilteredApartments: [],
                apartmentsInRange:[],
                api:''
            }
        },
        methods: {
            postRange(){
                this.api=`http://127.0.01:8000/api/rangeapartments?city=${this.city}&radius=${this.distance}`
                console.log('Ciao viva il miele')
                console.log(this.api)
                axios.post(this.api)
                this.getRange()
            },
            getRange(){
                axios.get('http://127.0.01:8000/api/rangeapartments').then((response)=>{
                    this.apartmentsInRange=response.data;
                })
            },
            addApartmentsToService () {
                for(let i= 0; i< this.apartments.length; i++){
                    let apaAndServ = {...this.apartments[i], 'services' : this.lista[i]}
                    this.apartmentsAndService.push(apaAndServ)
                }

            },
            filterSearch() {
                console.log('ciao')
                if(this.city.trim() != '') {

                    if (this.filteredApartments.length === 0) {

                        this.filteredApartments = this.apartmentsAndService.filter((apa)=>{
                        return apa.address.toLowerCase().includes(this.city.toLowerCase().trim())                        
                        })
                    } else {

                        this.filteredApartments = this.filteredApartments.filter((apa)=>{
                        return apa.address.toLowerCase().includes(this.city.toLowerCase().trim())   
                        })
                    }
                }

                if(this.rooms != 0) {
                    this.filteredApartments = this.filteredApartments.filter((apa)=>{
                    return apa.rooms_num == this.rooms
                })}

                if(this.beds != 0) {
                    this.filteredApartments = this.filteredApartments.filter((apa)=>{
                    return apa.beds_num == this.beds  
                })}

                //reset se si cancella la città
                if(this.city === '') {
                    this.filteredApartments = []
                    this.beds = 0
                    this.rooms = 0
                }
                this.copyFilteredApartments = this.filteredApartments

                this.serviceList = []
                this.serviceListFlag = true
            },
            filterServices () {
                if(this.serviceListFlag) {
                    // entra solo se c'è almeno un oggetto nell'array di appartamenti filtrati
                    if(this.copyFilteredApartments.length > 0) {
    
                        // entra solo se almeno un servizio è selezionato     
                        if(this.serviceList.length > 0) {
    
                            //per ogni appartamento confronta i servizi            
                            this.filteredApartments = this.copyFilteredApartments.filter((apa)=>{
    
                                //per ogni servizio nella lista di quelli selezionati, 
                                //controlla che sia presente nei servizi dell'appartamento
                                this.serviceList.forEach((service)=>{
                                    if (apa.services.includes(parseInt(service))) {
                                        this.serviceListFlag = true
    
                                    } else {
                                        this.serviceListFlag = false
                                    }                                
                                })
                                return this.serviceListFlag  
                            })    
                        }
                    }
                }
            }
        }
    }
</script>

    