@extends('layouts.app')

@section('content')
<div class="container-fluid jumbotron"></div>

<div class="container home">
    <div class="row">
        @foreach ($apartments as $apartment)
        <div class="articol-card col-12 col-md-6 col-lg-4 mt-3 mb-3">
            <a href="{{ route('apartmentShow', $apartment) }}" class="apartment">
                <h1>{{ $apartment->title }}</h1>
                <img class="img-apartment mb-3" src="{{ $apartment->img_path }}" alt="" style="width: 100%;">
                <div class="text-description">{{ $apartment->description }}</div>
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