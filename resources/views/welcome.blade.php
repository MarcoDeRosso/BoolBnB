@extends('layouts.app')

@section('content')

<div class="jumbotron-home d-flex justify-content-center align-items-center">
    <div class="text-center ">
        <h3 style="color: black"><strong>Non sai dove andare? Nessun problema!</strong></h3>
        <a href="{{ route('home') }}"><button class=" btn btn-primary reg-top text-capitalize">Cerca la tua prossima casa</button></a>
    </div>
</div>
<div class="container home p-3">
    <h1 class="p-5">Lasciati ispirare dalle nostre Case:</h1>

    <slider-card 
    :apartments="{{json_encode($apartmentsSponsored)}}"
    ></slider-card>
    
</div>
<div class="container home">
    <h1>Le mete più gettonate:</h1>
    <div class="row">
        @foreach ($apartments as $apartment)
        <div class="articol-card col-12 col-md-6 col-lg-4 mt-3 mb-3">
            <a href="{{ route('apartmentShow', $apartment) }}" class="apartment">
                <div>
                    <img class="img-apartment mb-3" src="{{ $apartment->img_path }}" alt="" >
                    <div class="price-tag">{{$apartment->price_night}} €</div>
                </div>
                <h2>{{ $apartment->title }}</h2>
                <div class="features d-flex justify-content-around pt-2">
                    <h6><i class="fas fa-home gradient"></i> Locali: {{$apartment->rooms_num}}</h6>
                    <h6><i class="fas fa-bed gradient"></i> Letti: {{$apartment->beds_num}}</h6>
                    <h6><i class="fas fa-shower gradient"></i> Bagni: {{$apartment->bath_num}}</h6>
                    <h6><i class="fas fa-th gradient"></i> Mq: {{$apartment->meters_size}}</h6>
                </div>
                {{-- <div class="text-description">{{ $apartment->description }}</div> --}}
            </a>       
        </div>        
        @endforeach
    </div>

</div>

<div class="d-flex justify-content-center mt-3">
    {{ $apartments->links() }}
</div>

<div class="jumbotron-footer d-flex justify-content-center align-items-center">
    <div class="text-center ">
        <h3><strong>Condividi il tuo spazio per guadagnare qualcosa in più e cogliere nuove opportunità.</strong></h3>
        <a href="{{ route('register') }}"><button class=" btn btn-primary reg-btn"> Diventa Host</button></a>
    </div>
</div>
@endsection