@extends('layouts.app')

@section('content')
<div class="container">
    <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Piano</th>
            <th scope="col">Durata</th>
            <th scope="col">Costo</th>
            <th scope="col"></th>

          </tr>
        </thead>
        <tbody>
            @foreach ($sponsors as $sponsor)
            <tr>
              <td>{{$sponsor->name}}</td>
              <td>{{$sponsor->hours}} ore</td>
              <td>€ {{$sponsor->cost }}</td>
              <td> 
                  <button>Seleziona</button> 
              </td>
            </tr>                
            @endforeach
        </tbody>
      </table>


</div>


@endsection