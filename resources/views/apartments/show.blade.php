@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">{{ $apartment->title }}</h1>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6 articol-card mt-3 mb-3">
        @foreach ($apartment->service as $service)
        <span class="badge badge-pill badge-success">{{ $service->title }}</span> 
        @endforeach
    </div>
    <img class="mt-3 mb-3" src="{{ $apartment->img_path }}" alt="" style="width: 100%">
    <div>
        <p> {{ $apartment->description }}</p>
        <input type="hidden" name="latitude" id="latitude" value="{{ $apartment->latitude }}">
        <input type="hidden" name="longitude" id="longitude" value="{{ $apartment->longitude }}">
    </div>


 {{-- MESSAGES --}}
    <div class="col-12 col-md-6 col-lg-6 articol-card mt-3 mb-3">
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
                    <button type="submit" class="btn btn-success text-center mb-3">Invia Messaggio</button>
                </div>
            </form>
        </div>
    </div>
     <div id="map-div"></div> 
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