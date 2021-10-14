<template>
<div>
    <div class="container-fluid jumbotron login"> 
        <div class="container login">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="card box-search">
                        <div class="card-header text-center bkg" style="font-weight:bold;"  >Non sai dove andare? Nessun problema!</div>

                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-5 col-form-label text-md-right" for="city">Città:</label>
                                <div class="col-md-4">
                                    <input class="box-shadow input-home" @keyup="filterSearch()"  type="text" id="city" name="city" v-model="city">
                                </div>
                            </div>

                            <div v-show="city != ''">
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label text-md-right" for="rooms_num">Numero di camere:</label>
                                    <div class="col-md-4">
                                        <input class="box-shadow input-home" @click="filterSearch()" type="number" min="5" max="8" v-model="rooms">

                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label text-md-right" for="beds_num">Numero di posti letto:</label>
                                    <div class="col-md-4">
                                        <input class="box-shadow input-home" @click="filterSearch()"  type="number" min="1" max="3" v-model="beds">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-5 col-form-label text-md-right" for="distance"> Raggio della ricera (0-20 km):</label>
                                    <div class="col-md-4 align-self-center">
                                        <!-- <input class="no-box-shadow slider" @change="postRange()" type="range" min="0" max="20" step="5"  v-model="distance"> -->
                                        <input class="no-box-shadow " @change="postRange()" type="range" list="tickmarks" min="0" max="20" step="5" v-model="distance">
                                        <datalist id="tickmarks">
                                        <option value="0"></option>
                                        <option value="5"></option>
                                        <option value="10"></option>
                                        <option value="15"></option>
                                        <option value="20"></option>
                                        </datalist>
                                    </div>
                                </div>

                                 <!-- Button Modal  -->
                                <div class="row">
                                    <div class="offset-md-5">
                                        <button type="button" class="btn btn-often" data-toggle="modal" data-target="#servicesExtra">
                                            Servizi Extra
                                        </button>
                                    </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="servicesExtra" tabindex="-1" aria-labelledby="servicesExtraLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header" style=" background-color:#92a8d1">
                                            <h5 class="modal-title" style="color:#034f84" id="servicesExtraLabel">Servizi Aggiuntivi</h5>  
                                        </div>
                                        <div class="modal-body row">
                                            <div class="col-6 text-center align-items-center" v-for="service in services" :key="service.id" >
                                                <label class="pt-3" for="`${service.title}`">{{ service.title }}</label>
                                                <input @change="filterServices()"  id="`${service.title}`" type="checkbox" :value="`${service.id}`" v-model="serviceList">
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button type="button" class="btn btn-often" data-dismiss="modal">Fatto</button>
                                            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <div class="container home">
        <div v-show="startSearchFlag">
            <h1>I risultati della tua ricerca:</h1>
            <div class="row " v-if="filteredApartments.length > 0">
                <div class="articol-card col-12 col-md-6 col-lg-4 mt-3 mb-3" v-for="(apa,index) in filteredApartments" :key="index">
                    <a href="" class="apartment">
                    <div>
                        <img class="img-apartment mb-3" :src="apa.img_path" alt="" >
                        <div class="price-tag"> {{ apa.price_night }}  €</div>
                    </div>
                    <h2> {{ apa.title }} </h2>
                    <div class="features d-flex justify-content-around pt-2">
                        <h6><i class="fas fa-home gradient"></i> Locali: {{ apa.rooms_num }}</h6>
                        <h6><i class="fas fa-bed gradient"></i> Letti: {{ apa.beds_num }}</h6>
                        <h6><i class="fas fa-shower gradient"></i> Bagni: {{ apa.bath_num }}</h6>
                        <h6><i class="fas fa-th gradient"></i> Mq: {{ apa.meters_size }}</h6>
                    </div>
                    
                </a>   
                </div>
            </div>
            <div v-else>
                <h2 class="text-center">Nessun appartamento trovato</h2>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    export default {
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
                api:'',
                numberOfServices:'',
                startSearchFlag :false
            }
        },
        methods: {
            postRange(){
                this.api=`http://127.0.01:8000/api/rangeapartments?city=${this.city}&radius=${this.distance}`
                axios.get(this.api).then(res=>{
                    console.log(res)
                    this.apartmentsInRange=res.data
                    this.filterSearch()
                })
            },
            addApartmentsToService () {
                for(let i= 0; i< this.apartments.length; i++){
                    let apaAndServ = {...this.apartments[i], 'services' : this.lista[i]}
                    this.apartmentsAndService.push(apaAndServ)
                }
            },
            filterSearch() {
                this.startSearchFlag = true

                if(this.apartmentsInRange.length != 0){
                    this.filteredApartments=this.apartmentsInRange;
                    this.apartmentsInRange= [];
                }
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

                // entra solo se c'è almeno un oggetto nell'array di appartamenti filtrati
                if(this.copyFilteredApartments.length > 0) {
                       
                    // entra solo se almeno un servizio è selezionato     
                    if(this.serviceList.length > 0) {
    
                        //per ogni appartamento confronta i servizi            
                        this.filteredApartments = this.copyFilteredApartments.filter((apa)=>{
                            
                            let nexStepFlag = true
    
                            //per ogni servizio nella lista di quelli selezionati, 
                            //controlla che sia presente nei servizi dell'appartamento
                            this.serviceList.forEach((service)=>{
                                if (apa.services.includes(parseInt(service)) && nexStepFlag === true)  {
                                    this.serviceListFlag = true
                                } else {
                                    this.serviceListFlag = false
                                    nexStepFlag = false
                                }                                
                            })
                            return this.serviceListFlag  
                        })    
                    }

                    if(this.serviceList.length === 0){
                        this.filteredApartments = this.copyFilteredApartments
                    }
                }
            }
        }
    }
</script>
<style scoped>
    .bkg{
        background-color: #92a8d1;
    }
    .input-home{
    text-align: center;
    }
    .box-search{    
    border: 2px solid #034f84;
    border-radius: 15px;
    padding: 15px auto;
    background: white;
    }
    .modal-header{
    justify-content: center!important;
    }
    .modal-content{     
    border: 2px solid #034f84;

}
</style>

    