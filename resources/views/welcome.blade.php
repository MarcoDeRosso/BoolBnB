@extends('layouts.app')

@section('content')

<div class="jumbotron-home d-flex justify-content-center align-items-center">
    <div class="text-center" style="background-color: rgba(0, 0, 0, 0.4); border-radius: 20px; padding:13px ">
        <h3 style="color: white"><strong>Non sai dove andare? Nessun problema!</strong></h3>
        <a href="{{ route('home') }}"><button class=" btn bn632-hover bn26">Cerca la tua prossima casa</button></a>
    </div>
</div>

<div class="container-fluid home p-5" style="background-color: #f2f2f3;">
    <div class="container">
        <h1 class="p-3">Lasciati ispirare dalle nostre Case:</h1>
        <slider-card 
        :apartments="{{json_encode($apartmentsSponsored)}}"
        ></slider-card>
    </div>    
</div>
<div class="container home p-3">
    <h1 class="pt-5 pb-3">Le mete più gettonate:</h1>
    <div class="row">
        @foreach ($apartments as $apartment)
        <div class="articol-card col-12 col-md-6 col-lg-4 mt-3 mb-5">
            <a href="{{ route('apartmentShow', $apartment) }}" class="apartment">
                <div>
                    <img class="img-apartment mb-3" src="{{ $apartment->img_path }}" alt="" >
                    <div class="price-tag">{{$apartment->price_night}} €</div>
                </div>
                <h2>{{ $apartment->title }}</h2>
                <div class="features d-flex justify-content-around pt-2 pb-2">
                    <h6><i class="fas fa-home gradient"></i> Locali: {{$apartment->rooms_num}}</h6>
                    <h6><i class="fas fa-bed gradient"></i> Letti: {{$apartment->beds_num}}</h6>
                    <h6><i class="fas fa-shower gradient"></i> Bagni: {{$apartment->bath_num}}</h6>
                    <h6><i class="fas fa-th gradient"></i> Mq: {{$apartment->meters_size}}</h6>
                </div>
            </a>       
        </div>        
        @endforeach
    </div>

</div>

<div class="container no-limit">
    <div class="row text-center">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mb-3">
            <h1>Seguici sui nostri social media per rimanere sempre aggiornato</h1>
        </div>       
    </div>
</div>
<div class="container social mb-5">
    <div class="row">
        {{-- <div class="col-6 col-sm-3 col-md-3 col-lg-2 offset-lg-2">
            <a href="#"><img src={{ asset('storage/images/twitter.jpg') }} alt="ps5"></a>
        </div>
        <div class="col-6 col-sm-3 col-md-3 col-lg-2">
            <a href="#"><img src={{ asset('storage/images/facebook.jpg') }} alt=""></a>
        </div>
        <div class="col-6 col-sm-3 col-md-3 col-lg-2">
            <a href="#"><img src={{ asset('storage/images/instagram.jpg') }} alt=""></a>
        </div>
        <div class="col-6 col-sm-3 col-md-3 col-lg-2">
            <a href="#"><img src={{ asset('storage/images/youtube.png') }} alt=""></a>
        </div>        --}}
        <div class="hexagon-wrapper">
            <div class="hexagon">
              <i class="fab fa-facebook"></i>
            </div>
          </div>
          <div class="hexagon-wrapper">
            <div class="hexagon">
              <i class="fab fa-twitter"></i>
            </div>
          </div>
          <div class="hexagon-wrapper">
            <div class="hexagon">
              <i class="fab fa-instagram"></i>
            </div>
          </div>
          <div class="hexagon-wrapper">
            <div class="hexagon">
              <i class="fab fa-youtube"></i>
            </div>
          </div>
    </div>

</div>

<div class="jumbotron-footer d-flex justify-content-center align-items-center mt-3">
    <div class="text-center ">
        <h3><strong>Condividi il tuo spazio per guadagnare qualcosa in più e cogliere nuove opportunità.</strong></h3>
        <a href="{{ route('register') }}"><button class=" btn bn632-hover bn26"> Diventa Host</button></a>
    </div>
</div>
@endsection