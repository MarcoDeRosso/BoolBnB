<template>
    <div>
        <div class="container login">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ricerca avanzata') }}</div>
    
                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
    
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-mail') }}</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
    
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class=" @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
    
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input no-box-shadow " type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                        <label class="form-check-label no-box-shadow " for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
    
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>
    
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    
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