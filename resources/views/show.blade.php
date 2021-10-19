@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mt-4">{{ $apartment->title }}</h1>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6 articol-card  mb-3">
            <div class="img-box mb-5">
                @if (str_contains($apartment->img_path, 'https'))
                <img class="img-apartment mt-3 mb-3" src="{{ $apartment->img_path }}" alt="" style="width: 100%">
                @else
                <img class="img-apartment mt-3 mb-3" src="{{asset('storage/' . $apartment->img_path )}}" alt="" style="width: 100%">
                @endif
                <div class="price-tag">{{$apartment->price_night}} €</div>
            </div>
            <div class="features">
                <h4 class="font-weight-bold">CARATTERISTICHE</h4>
                <h6 style="display: inline-block; margin-left: 7px"><i class="fas fa-home gradient"></i> Locali: {{$apartment->rooms_num}}</h6>
                <h6 style="display: inline-block; margin-left: 7px"><i class="fas fa-bed gradient" ></i> Letti: {{$apartment->beds_num}}</h6>
                <h6 style="display: inline-block; margin-left: 7px"><i class="fas fa-shower gradient" ></i> Bagni: {{$apartment->bath_num}}</h6>
                <h6 style="display: inline-block; margin-left: 7px"><i class="fas fa-th gradient"></i> Metri Quadri: {{$apartment->meters_size}}</h6>
            </div>
            @foreach ($apartment->service as $service)
                <span class="custom-badge">{{ $service->title }}</span> 
            @endforeach
            <p class="mt-3"> {{ $apartment->description }}</p>
            <input type="hidden" name="latitude" id="latitude" value="{{ $apartment->latitude }}">
            <input type="hidden" name="longitude" id="longitude" value="{{ $apartment->longitude }}">
        </div>
        <div class="col-12 col-md-6 col-lg-6 articol-card mt-3">
            <div id="map-div"></div>

            <div>
                <h3>Invia un messaggio all'Host</h3>
            
                    @if ($errors->any())
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li> {{ $error }}</li>
                    @endforeach
                    </ul>
                    @endif
            
                <form action="{{ route('messages.store', ['id'=>$apartment->id]) }}" method='POST'>
                    @csrf
            
                    <div class="form-group">
                        <label for="full_name">Nome:</label>
                        <input type="text" class="form-control" name="full_name" id="full_name">
                    </div>
            
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" name="email" id="email">
                    </div>
            
                    <div class="form-group">
                        <label for="text">Testo:</label> <br>
                        <textarea style="width:100%;" rows="5" name="text" id="text" placeholder="Scrivi qui il tuo messaggio"></textarea>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-often text-center mb-3">Invia Messaggio</button>
                    </div>
                </form>
            </div>
             
        </div>
    </div>


 {{-- MESSAGES --}}
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
    </script>
@endsection