@extends('layouts.app')

@section('content')
<div class="jumbotron-sponsor d-flex justify-content-center align-items-center">
    @if ($apartment->sponsorActive)
    <div class="text-center sponsor ">
        <h3><strong>Complimenti! Il tuo appartamento è in evidenza <br> sulla nostra piattaforma.</strong></h3>
        @foreach ($payment as $pay)
        @if($loop->last)
        <div>Fino al {{$pay['expire_date']}} (UTC)</div>
        @endif            
        @endforeach
    </div>
    @else
    <div class="text-center sponsor ">
        <h3><strong>Metti in evidenza il tuo appartamento!
            <br> Puoi scegliere tra diverse tipologie <br> di sponsorizzazione.</strong></h3>
        <a href="{{ route('sponsor', $apartment) }}"><button class=" bn632-hover bn21"> Sponsorizza Adesso</button></a>
    </div>
    @endif
</div>   
<div class="container">
    <h1 class="text-center mt-4">{{ $apartment->title }}</h1>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6 articol-card mt-3 mb-3">
            <img class="mt-3 mb-3" src="{{ $apartment->img_path }}" alt="" style="width: 100%">
            <div class="features">
                <h4>CARATTERISTICHE</h4>
                <h6 style="display: inline-block; margin-left: 7px"><i class="fas fa-home gradient"></i> Locali: {{$apartment->rooms_num}}</h6>
                <h6 style="display: inline-block; margin-left: 7px"><i class="fas fa-bed gradient" ></i> Letti: {{$apartment->beds_num}}</h6>
                <h6 style="display: inline-block; margin-left: 7px"><i class="fas fa-shower gradient" ></i> Bagni: {{$apartment->bath_num}}</h6>
                <h6 style="display: inline-block; margin-left: 7px"><i class="fas fa-th gradient"></i> Metri Quadri: {{$apartment->meters_size}}</h6>
            </div>
            @foreach ($apartment->service as $service)
                <span class="badge badge-pill-custom badge-success">{{ $service->title }}</span> 
            @endforeach

            <input type="hidden" name="latitude" id="latitude" value="{{ $apartment->latitude }}">
            <input type="hidden" name="longitude" id="longitude" value="{{ $apartment->longitude }}">
        </div>
        <div class="col-12 col-md-6 col-lg-6 articol-card mt-3 mb-3">
            <div id="map-div"></div>             
        </div>
        <div class="col-12">
            <p class="mt-3"> {{ $apartment->description }}</p>
        </div>
    </div>
    
</div>
<div class="container d-flex justify-content-around buttons">
    <button class="bn632-hover bn21">
        <a href="{{ route('apartments.edit', $apartment) }}">
            Modifica Info
        </a>
    </button>     
     <form action=" {{ route('apartments.destroy', $apartment) }} " method="POST">
        @csrf
        @method('DELETE')                  
        <button type="submit" class="bn632-hover bn21">Elimina Appartamento</button>
    </form> 
</div>

{{-- messaggi  --}}
<div class="container-fluid msgs">
    <div class="container">
        @if (count($apartment->message) > 0)    
        <h1>Inbox Mail per {{ $apartment->title }}</h1>
        
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Email</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Messaggio</th>
                    <th scope="col">Azioni</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($apartment->message as $msg)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $msg->full_name}}</td>
                    <td>{{ $msg->email}}</td>
                    <td>{{ $msg->text}}</td>
                    <td>Elimina</td>

                </tr>
                @endforeach
            </tbody>
        </table>   
        @else
            <h1>Ops, peccato, ancora nessun messaggio <br> per {{ $apartment->title }}</h1>
            <h2 class="text-center">Sponsorizza l'apparmantento per ricevere più messaggi!</h2>    
        @endif
    </div>
</div>


{{-- statistiche  --}}

<div class="container graphic">
    <h1>Statische dell'utima settimana di: {{ $apartment->title }}</h1>
    <div>
        <canvas id="myChart"></canvas>
    </div>
</div>

@endsection
@section('script')
    <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.5.0/maps/maps-web.min.js"></script>
    <script>
        setTimeout(() => {
            
            const API_KEY = 'RagRFtF86mML8SeN6kqbSiihdZpGAE1d';
            const APPLICATION_NAME = 'BoolBnb';
            const APPLICATION_VERSION = '1.0';
            const latitude = {!! json_encode($apartment->latitude) !!};      
            const longitude = {!! json_encode($apartment->longitude) !!};      
            const coordinates = {lat: latitude, lon: longitude};
            var map = tt.map({
                key: API_KEY,
                container: 'map-div',
                center: coordinates,
                zoom: 16
            });
            map.addControl(new tt.FullscreenControl());
            map.addControl(new tt.NavigationControl());
            var marker = new tt.Marker().setLngLat(coordinates).addTo(map);
        }, 1000);
        setTimeout(() => {
            let myChart = document.getElementById('myChart').getContext('2d');
            let statisticChart = new Chart(myChart,{
                type:'bar',// bar, horizontalBar, pie, line, doughnut, radar
                data:{
                    labels:[
                        @foreach ($statisticByDay as $item)
                            @if($loop->remaining < 7)
                                '{{$item[0]}}',       
                            @endif
                        @endforeach

                    ],
                    datasets:[{
                        label:'Visite',
                        data:[
                            @foreach ($statisticByDay as $item)
                                @if($loop->remaining < 7)
                                    {{$item[1]}},       
                                @endif
                            @endforeach
                        ],
                        backgroundColor: '#FF8964'
                    }],
                },
                option:{}
            });
            
        }, 1000);
    </script>
@endsection