@extends('layouts.app')

@section('content')
<div class="bg">
<div class="container box-edit py-5">
    @if ($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
          <li> {{ $error }}</li>
      @endforeach
    </ul>
    @endif

    <form action="{{ route('apartments.store') }}" method='POST' enctype="multipart/form-data">
        @csrf
        <div class="form-group row d-flex justify-content-between px-3">
            <label class="col-3" for="title">
                <h3>Titolo</h3>
            </label>
            <input class="col-7 box-shadow" type="text" class="form-control" name="title" id="title" placeholder="Scegli un titolo">
        </div>
    
        <div class="form-group row d-flex justify-content-between px-3">
            <label class="col-3 " for="description">
                <h3>Descrizione</h3>
            </label>
            <textarea class="col-7 box-shadow" id="description" name="description" rows="5" placeholder="Scrivi la tua descrizione"></textarea>
        </div>

        <div class="form-group row d-flex px-3">
            <label class="col-5 col-xl-5 col-md-5 col-sm-5 " for="rooms_num">
                <h3>Numero di camere</h3>
            </label>
            <input class="col-7 box-shadow" type="number" id="rooms_num" name="rooms_num" min="1" max="15" placeholder="1-15">
        </div>

        <div class="form-group row d-flex px-3">
            <label class="col-5 col-xl-5 col-md-5 col-sm-5  " for="beds_num">
                <h3>Numero di posti letto</h3>
            </label>
            <input class="col-7 box-shadow" type="number" id="beds_num" name="beds_num" min="1" max="10" placeholder="1-10">
        </div>

        <div class="form-group row d-flex px-3">
            <label class="col-5 col-xl-5 col-md-5 col-sm-5 " for="bath_num">
                <h3> Numero bagni</h3>
            </label>
            <input class="col-7 box-shadow" type="number" id="bath_num" name="bath_num" min="1" max="5"  placeholder="1-5">
        </div>

        <div class="form-group d-flex row px-3">
            <label class="col-5 col-xl-5 col-md-5 col-sm-5" for="meters_size">
                <h3>Metri quadri</h3>
            </label>
            <input class="col-7 box-shadow" type="number" id="meters_size" name="meters_size" min="20" max="1000"  placeholder="Inserisci la grandezza">
        </div>

        <div class="form-group row d-flex px-3">
            <label class="col-5 col-xl-5 col-md-5 col-sm-5" for="address">
                <h3>Indirizzo</h3>
            </label>
            <input class="col-7 box-shadow" type="text" class="form-control" name="address" id="address"  placeholder="Inserisci l'indirizzo">
        </div>

        <div class="form-group row d-flex px-3">
            <label class="col-5 col-xl-5 col-md-5 col-sm-5" for="img_path">
                <h3>Immagine</h3>
            </label>
            <input class="col-7 border-0" type="file" class="form-control" name="img_path" id="img_path">
        </div>

        <div class="form-group row d-flex px-3">
            <label class="col-5 col-xl-5 col-md-5 col-sm-5 " for="price_night">
                <h3>Prezzo per notte</h3>
            </label>
            <input class="col-7 box-shadow" type="number" id="price_night" name="price_night" min="1" max="65000" placeholder="Scegli un prezzo" step="5">
        </div>
    
        <div class="row d-flex px-3">
            <div class="col-5 col-xl-5 col-md-5 col-sm-5">
                <h3>Servizi</h3>
            </div>
            <div class="col-7">
                <div class="row">
                    
                    @foreach ($services as $service)
                        <div class="col-6 col-xl-3 col-md-4 col-sm-5 box-shadow-orange text-center align-items-center row m-1 py-1">
                            <label class="col-xl-10 col-md-12" for="{{ $service->id }}"> {{ $service->title }}</label>  
                            <input class="col-xl-2 col-md-12" type="checkbox" id="{{ $service->id }}" name="services[]" value="{{ $service->id }}">
    
                        </div>
                    @endforeach
                </div>
               
            </div>
        </div>


        <div class="form-group row pt-3 px-3">
            <label class="col-12 col-xl-5 col-md-5 col-sm-12 space-between " for="visible">
                <h5>Vuoi rendere l'annuncio visibile sulla piattaforma?</h5>
            </label>
            <select name="visible" id="visible">
                <option value="0">No</option>
                <option value="1">Si</option>
            </select>
        </div>

        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-outline-success">Carica annuncio</button>
        </div>
    
    </form>

    

</div>
</div>
@endsection