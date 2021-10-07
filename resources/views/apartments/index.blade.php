@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Appartamenti pubblicati sulla piattaforma:</h1>

    @foreach ($apartments as $apartment)
        
    <h2>{{ $apartment->title }}</h2>
    
    <div>
        @foreach ($apartment->service as $service)
        <span class="badge badge-success">{{ $service->title }}</span>
        
        @endforeach
    </div>
    <img src="{{ $apartment->img_path }}" alt="" style="width: 100%">
    <div>
        <p> {{ $apartment->description }}</p>
    </div>

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


    @endforeach


    <div>
        <button class="btn btn-warning">
            <a href="{{ route('apartments.create') }}">
                Aggiungi un appartamento            
            </a>
        </button>

    </div>


</div>


@endsection