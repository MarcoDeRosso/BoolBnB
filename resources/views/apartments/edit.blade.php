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

    <form action="{{ route('apartments.update', $apartment) }}" method='POST' enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Titolo:</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ $apartment->title }}">
        </div>
    
        <div class="form-group">
            <label for="description">Descrizione:</label>
            <textarea id="description" name="description" rows="5">{{ $apartment->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="rooms_num">Numero di camere:</label>
            <input type="number" id="rooms_num" name="rooms_num" min="1" max="15" value="{{ $apartment->rooms_num }}">
        </div>

        <div class="form-group">
            <label for="beds_num">Numero di posti letto:</label>
            <input type="number" id="beds_num" name="beds_num" min="1" max="10" value="{{ $apartment->beds_num }}">
        </div>

        <div class="form-group">
            <label for="bath_num">Numero bagni:</label>
            <input type="number" id="bath_num" name="bath_num" min="1" max="5" value="{{ $apartment->bath_num }}">
        </div>

        <div class="form-group">
            <label for="meters_size">Metri quadri: </label>
            <input type="number" id="meters_size" name="meters_size" min="20" max="1000" value="{{ $apartment->meters_size }}">
        </div>

        <div class="form-group">
            <label for="address">Indirizzo:</label>
            <input type="text" class="form-control" name="address" id="address" value="{{ $apartment->address }}">
        </div> 

        <div class="form-group">
            <label for="img_path">Immagine:</label>
            <input type="file" class="form-control" name="img_path" id="img_path">
        </div>

        <div class="form-group">
            <label for="price_night">Prezzo per notte:</label>
            <input type="number" id="price_night" name="price_night" min="1" max="65000" value="{{ $apartment->price_night }}">
        </div>

        <h3>Servizi:</h3>        
        <div>
            @foreach ($services as $service)
            @if ($apartment->service->contains($service->id))
                <input checked name="services[]" type="checkbox" id="{{ $service->id }}" value="{{ $service->id }}">
                <label for="{{ $service->id }}">{{ $service->title }}</label>                
            @endif
                <input name="services[]" type="checkbox" id="{{ $service->id }}" value="{{ $service->id }}">
                <label for="{{ $service->id }}">{{ $service->title }}</label>                 
            @endforeach
        </div>

        <div class="form-group">
            <label for="visible" >Vuoi rendere l'annuncio visibile sulla piattaforma?</label>
            <select name="visible" id="visible">
                @if ($apartment->visible == 1)
                <option selected value="1">Si</option>
                <option value="0">No</option>
                @else
                <option value="1">Si</option>
                <option selected value="0">No</option>
                    
                @endif
            </select>
        </div>

        <button type="submit" class="btn btn-success">Submit</button>
    
    </form>

    
</div>
@endsection