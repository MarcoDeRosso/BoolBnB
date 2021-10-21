@extends('layouts.app')

@section('content')
<div class="index">
    <div class="jumbotron">
        <div class="white-space">
            <h1>Bentornato <span class="info-name"> {{ Auth::user()->name }} {{ Auth::user()->surname }}</span>, <br> questa è la tua Dashboard:</h1>
        </div> 
    </div>
    <div class="container-fluid">
        
        @if (count($apartments)>0)
        <h1 class="text-center" >I tuoi appartamenti pubblicati sulla piattaforma sono i seguenti:</h1>
        <div class="row">
            <table class="table table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Immagine</th>
                        <th scope="col">Via</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Sponsorizzato</th>
                        <th scope="col">Visibile</th>
                        <th scope="col">Visualizza in dettaglio</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($apartments as $apa)
                    <tr >
                        <th class="align-middle" scope="row"> {{ $loop->iteration }} </th>
                        <td class="align-middle">
                            @if (str_contains($apa->img_path, 'https'))
                                <img src="{{ $apa->img_path }}" alt="">
                            @else
                                <img src="{{asset('storage/' . $apa->img_path )}}" alt="">
                            @endif
                        </td>
                        <td class="align-middle">{{ $apa->address }}</td>
                        <td class="align-middle">{{ $apa->title }}</td>
                        <td class="align-middle">{{ $apa->sponsorActive }}</td>
                        <td class="align-middle">{{ $apa->visible }}</td>
                        <td class="align-middle">
                            <a href="{{route('apartments.show', $apa)}}">
                                <button type="button" class="bn632-hover bn26"><i class="fas fa-search-plus"></i></button>
                            </a>
                        </td>
                    </tr>  
                @endforeach
                           
                </tbody>
            </table>
        </div>
        @else
        <h1 class="text-center">Al momento non hai ancora alcun appartmaneto pubblicato sulla nostra piattaforma</h1>
    </div>
    
    @endif
    <div class="text-center">
        <button class="bn632-hover bn26">
            <a href="{{ route('apartments.create') }}">
                Aggiungi un appartamento            
            </a>
        </button>
    </div>
</div>
@endsection
