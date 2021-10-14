@extends('layouts.app')

@section('content')
<search-home
:services="{{ json_encode($services) }}" 
:apartments="{{json_encode($apartments)}}"
:lista="{{json_encode($lista)}}"
>
</search-home>

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

   {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
            </div> 
        </div>
    </div> --}}


</div>
@endsection