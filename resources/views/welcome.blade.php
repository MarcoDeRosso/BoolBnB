@extends('layouts.app')

@section('content')
<div class="container home">
    <h1>SLIDER Appartmanti Sponsorizzati</h1>
    <h1>BUTTON Ricerca Avanzata</h1> 
    <h1>Iscriviti o Accedi</h1>

    @foreach ($apartmentsSponsored as $apa)    
    <h1> {{ $apa->title }}</h1>
    <img class="img-apartment mb-3" style="width:100%" src="{{ $apa->img_path}}" alt="">    
        
    @endforeach

</div>
@endsection