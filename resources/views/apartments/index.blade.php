@extends('layouts.app')

@section('content')
<div class="container">
    <div class="text-center">
        <button class="btn btn-warning">
            <a href="{{ route('apartments.create') }}">
                Aggiungi un appartamento            
            </a>
        </button>

    </div>
    <h1>DASHBORAD</h1>
    <h1>Appartamenti pubblicati sulla piattaforma:</h1>
    
    <div class="row">
        @foreach ($apartments as $apartment)
        <div class="col-12 col-md-6 col-lg-6 articol-card mt-3 mb-3">
            <a href="{{ route('apartmentShow', $apartment) }}">
                <h2>{{ $apartment->title }}</h2>
            </a>  

                @foreach ($apartment->service as $service)
                <span class="badge badge-pill badge-success">{{ $service->title }}</span>
                @endforeach

            <img class="img-apartment mb-3" src="{{ $apartment->img_path }}" alt="" style="width: 100%;">
            <div class="text-description">{{ $apartment->description }}</div>

            <button class="btn btn-success">
                <a href="{{ route('apartments.edit', $apartment) }}">
                    Modifica Info
                </a>
            </button>
        
            <form action=" {{ route('apartments.destroy', $apartment) }} " method="POST">
                @csrf
                @method('DELETE')                  
                <button type="submit" class="btn btn-danger">Elimina Appartamento</button>
            </form>
    
        </div>        
        @endforeach

    </div>
</div>


@endsection