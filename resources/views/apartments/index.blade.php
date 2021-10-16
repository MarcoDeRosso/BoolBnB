@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <h1 class="mt-3">Ciao {{ Auth::user()->name }} {{ Auth::user()->surname }}, questa è la tua Dashboard</h1>
    <h2 class="text-center mb-3" >I tuoi appartamenti pubblicati sulla piattaforma sono i seguenti:</h2>
    
    <div class="row mt-3">
        <table class="table table-striped text-center ">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Immagine</th>
                    <th scope="col">Via</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Sponsorizzato</th>
                    <th scope="col">Visibile</th>
                    <th scope="col">Modifica</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($apartments as $apa)
                <tr >
                    <th class="align-middle" scope="row"> {{ $loop->iteration }} </th>
                    <td class="align-middle">
                        <img src="{{ $apa->img_path }}" style="width: 100px; border-radius: 0;" alt="">
                    </td>
                    <td class="align-middle">{{ $apa->address }}</td>
                    <td class="align-middle">{{ $apa->title }}</td>
                    <td class="align-middle">{{ $apa->sponsorActive }}</td>
                    <td class="align-middle">{{ $apa->visible }}</td>
                    <td class="align-middle">
                        <a href="{{route('apartments.show', $apa)}}">
                            <button type="button" class="btn btn-primary"><i class="fas fa-search-plus" style="color: black"></i></button>
                        </a>
                    </td>
                </tr>  
            @endforeach
                       
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <button class="btn btn-often mb-5 mt-3">
            <a href="{{ route('apartments.create') }}">
                Aggiungi un appartamento            
            </a>
        </button>
    </div>

</div>
@endsection
