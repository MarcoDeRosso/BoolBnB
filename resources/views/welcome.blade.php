@extends('layouts.app')

@section('content')
<div class="jumbotron-home d-flex justify-content-center align-items-center">
    <div class="text-center ">
        <h3 style="color: black"><strong>Non sai dove andare? Nessun problema!</strong></h3>
        <a href="{{ route('home') }}"><button class=" btn btn-primary reg-top text-capitalize">Cerca la tua prossima casa</button></a>
    </div>
</div>
<div class="container home">
    <h1>Appartamenti in evidenza :</h1>
    <slider-card 
    :apartments="{{json_encode($apartmentsSponsored)}}"
    ></slider-card>
    
</div>

<div class="jumbotron-footer d-flex justify-content-center align-items-center">
    <div class="text-center ">
        <h3><strong>Condividi il tuo spazio per guadagnare qualcosa in più e cogliere nuove opportunità.</strong></h3>
        <a href="{{ route('register') }}"><button class=" btn btn-primary reg-btn">Diventa Host</button></a>
    </div>
</div>
@endsection