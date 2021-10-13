@extends('layouts.app')

@section('content')
<div class="container">
    
    <h1>DASHBORAD</h1>
    <h1>Appartamenti pubblicati sulla piattaforma:</h1>
    
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Immagine</th>
                    <th scope="col">Via</th>
                    <th scope="col">Titolo</th>
                    <th scope="col">Visibile</th>
                    <th scope="col">Modifica</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($apartments as $apa)
                <tr>
                    <th scope="row"> {{ $loop->iteration }} </th>
                    <td>
                        <img src="{{ $apa->img_path }}" style="width: 100px; border-radius: 0;" alt="">
                    </td>
                    <td>{{ $apa->address }}</td>
                    <td>{{ $apa->title }}</td>
                    <td>{{ $apa->visible }}</td>
                    <td>
                        <a href="{{route('apartments.show', $apa)}}">
                            <button type="button" class="btn btn-primary"><i class="fas fa-search-plus"></i></button>
                        </a>
                    </td>
                </tr>  
            @endforeach
                       
            </tbody>
        </table>
    </div>
    <div class="text-center">
        <button class="btn btn-warning">
            <a href="{{ route('apartments.create') }}">
                Aggiungi un appartamento            
            </a>
        </button>
    </div>

</div>
@endsection
