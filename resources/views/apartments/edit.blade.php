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

        <form action="{{ route('apartments.update', $apartment) }}" method='POST' enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group row d-flex justify-content-between px-3">
                <label class="col-3" for="title">
                    <h3>Titolo</h3>
                </label>
                <input class="col-7" type="text" class="form-control rounded-end" name="title" id="title" value="{{ $apartment->title }}">
            </div>

            <div class="form-group row d-flex justify-content-between px-3">
                <label class="col-3 " for="description">
                    <h3>Descrizione</h3>
                </label>
                <textarea class="col-7" id="description" name="description" rows="5">{{ $apartment->description }}</textarea>
            </div>

            <div class="form-group row d-flex px-3">
                <label class="col-5 col-xl-5 col-md-5 col-sm-5 " for="rooms_num">
                    <h3>Numero di camere</h3>
                </label>
                <input class="col-7" type="number" id="rooms_num" name="rooms_num" min="1" max="15" value="{{ $apartment->rooms_num }}">
            </div>

            <div class="form-group row d-flex px-3">
                <label class="col-5 col-xl-5 col-md-5 col-sm-5  " for="beds_num">
                    <h3>Numero di posti letto</h3>
                </label>
                <input class="col-7" type="number" id="beds_num" name="beds_num" min="1" max="10" value="{{ $apartment->beds_num }}">
            </div>

            <div class="form-group row d-flex px-3">
                <label class="col-5 col-xl-5 col-md-5 col-sm-5 " for="bath_num">
                    <h3> Numero bagni</h3>
                </label>
                <input class="col-7" type="number" id="bath_num" name="bath_num" min="1" max="5" value="{{ $apartment->bath_num }}">
            </div>

            <div class="form-group d-flex row px-3">
                <label class="col-5 col-xl-5 col-md-5 col-sm-5" for="meters_size">
                    <h3>Metri quadri</h3>
                </label>
                <input class="col-7" type="number" id="meters_size" name="meters_size" min="20" max="1000" value="{{ $apartment->meters_size }}">
            </div>

            <div class="form-group row d-flex px-3">
                <label class="col-5 col-xl-5 col-md-5 col-sm-5" for="address">
                    <h3>Indirizzo</h3>
                </label>
                <input class="col-7" type="text" class="form-control" name="address" id="address" value="{{ $apartment->address }}">
            </div>

            <div class="form-group row d-flex px-3">
                <label class="col-5 col-xl-5 col-md-5 col-sm-5" for="img_path">
                    <h3>Immagine</h3>
                </label>
                <input class="col-7" type="file" class="form-control" name="img_path" id="img_path">
            </div>

            <div class="form-group row d-flex px-3">
                <label class="col-5 col-xl-5 col-md-5 col-sm-5 " for="price_night">
                    <h3>Prezzo per notte</h3>
                </label>
                <input class="col-7" type="number" id="price_night" name="price_night" min="1" max="65000" value="{{ $apartment->price_night }}">
            </div>

            <div class="row d-flex px-3">
                <div class="col-5 col-xl-5 col-md-5 col-sm-5">
                    <h3>Servizi</h3>
                </div>
                <div class="col-7">
                    @foreach ($services as $service)

                    @if ($apartment->service->contains($service->id))
                    <input checked name="services[]" type="checkbox" id="{{ $service->id }}" value="{{ $service->id }}">
                    <label for="{{ $service->id }}">{{ $service->title }}</label>
                    @else
                    <input name="services[]" type="checkbox" id="{{ $service->id }}" value="{{ $service->id }}">
                    <label for="{{ $service->id }}">{{ $service->title }}</label>
                    @endif

                    @endforeach
                </div>
            </div>


            <div class="form-group row pt-3 px-3">
                <label class="col-12 col-xl-7 col-md-10 col-sm-12 " for="visible">
                    <h5>Vuoi rendere l'annuncio visibile sulla piattaforma?</h5>
                </label>

                <select class="form-select" name="visible" id="visible">
                    @if ($apartment->visible == 1)
                    <option selected value="1">Si</option>
                    <option value="0">No</option>
                    @else
                    <option value="1">Si</option>
                    <option selected value="0">No</option>

                    @endif
                </select>
            </div>

            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-outline-success">Salva le modifiche</button>
            </div>

        </form>


    </div>
</div>
@endsection