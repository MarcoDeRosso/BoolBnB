@extends('layouts.app')

@section('content')
<div class="home">
    {{-- <h1>Appartamenti in evidenza :</h1> --}}
    <slider-card 
    :apartments="{{json_encode($apartmentsSponsored)}}"
    ></slider-card>
    <a href="{{ route('home') }}">
        <h1>BUTTON Ricerca Avanzata</h1>         
    </a>
    <h1>Iscriviti o Accedi</h1>
</div>
@endsection