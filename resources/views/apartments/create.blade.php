@extends('layouts.app')

@section('content')
<div class="container">
    @if ($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
          <li> {{ $error }}</li>
      @endforeach
    </ul>
    @endif

    <form action="{{ route('apartments.store') }}" method='POST' enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Titolo:</label>
            <input type="text" class="form-control" name="title" id="title" placeholder="Scrivi qui il titolo">
        </div>
    
        <div class="form-group">

            <label for="description">Descrizione:</label> <br>
            <textarea id="description" name="description" rows="5" placeholder="Scrivi qui la descrizione dell'appartamento" style="width: 100%"></textarea>

        </div>

        <div class="form-group">
            <label for="rooms_num">Numero di camere:</label>

            <input type="number" id="rooms_num" name="rooms_num" min="1" max="15" >

        </div>

        <div class="form-group">
            <label for="beds_num">Numero di posti letto:</label>
            <input type="number" id="beds_num" name="beds_num" min="1" max="10">
        </div>

        <div class="form-group">

            <label for="bath_num">Numero bagni:</label>
            <input type="number" id="bath_num" name="bath_num" min="1" max="5">

        </div>

        <div class="form-group">
            <label for="meters_size">Metri quadri: </label>
            <input type="number" id="meters_size" name="meters_size" min="20" max="1000">
        </div>

        <div class="form-group">
            <label for="address">Indirizzo:</label>
            <input type="text" class="form-control" name="address" id="address" placeholder="Indirizzo, via, numero, cap...">
        </div> 

        <div class="form-group">
            <label for="img_path">Immagine:</label>
            <input type="file" class="form-control" name="img_path" id="img_path">
        </div>

        <div class="form-group">
            <label for="price_night">Prezzo per notte:</label>
            <input type="number" id="price_night" name="price_night" min="1" max="65000">
        </div>


        <button type="submit" class="btn btn-success">Submit</button>
    
    </form>
    <h1>Geocoding</h1> 
    <div> 
        Location: 
        <input type="text" id="geoLocationQuery"><br> 
        <button id="geocodeBtn">Submit</button> 
    </div>  
    <div id="map-div"></div>


        <h3>Servizi:</h3>

        <div>
            @foreach ($services as $service)
            <input type="checkbox" id="{{ $service->id }}" name="services[]" value="{{ $service->id }}">
            <label for="{{ $service->id }}"> {{ $service->title }}</label>            
            @endforeach

        </div>

        <div class="form-group">
            <label for="visible" >Vuoi rendere l'annuncio visibile sulla piattaforma?</label>
            <select name="visible" id="visible">
                <option value="0">No</option>
                <option value="1">Si</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    
    </form>

    

</div>
@endsection