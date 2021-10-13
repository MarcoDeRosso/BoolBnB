@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center mt-4">{{ $apartment->title }}</h1>
    <div class="row">
        <div class="col-12 col-md-6 col-lg-6 articol-card mt-3 mb-3">
            <img class="mt-3 mb-3" src="{{ $apartment->img_path }}" alt="" style="width: 100%">
            <p class="mt-3"> {{ $apartment->description }}</p>
            <input type="hidden" name="latitude" id="latitude" value="{{ $apartment->latitude }}">
            <input type="hidden" name="longitude" id="longitude" value="{{ $apartment->longitude }}">
        </div>
        <div class="col-12 col-md-6 col-lg-6 articol-card mt-3 mb-3">
            <div id="map-div"></div>             
        </div>
    </div>
</div>
<div class="container">
    <button class="btn btn-success">
        <a href="{{ route('apartments.edit', $apartment) }}">
            Modifica Info
        </a>
    </button>
    
    <form action=" {{ route('apartments.destroy', $apartment) }} " method="POST">
        @csrf
        @method('DELETE')                  
        <button type="submit" class="btn btn-danger">Elimina Appartamento</button>
    </form>
    <button class="btn btn-success">Sponsorizza Appartamento</button>

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