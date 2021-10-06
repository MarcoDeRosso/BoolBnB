@extends('layouts.app')

@section('content')
<div>
    @foreach ($apartments as $apartment)
        
    <h1>{{ $apartment->title }}</h1>
    
    <div>
        @foreach ($apartment->service as $service)
        <span class="badge badge-success">{{ $service->title }}</span>
        
        @endforeach
    </div>
    <img src="{{ $apartment->img_path }}" alt="">
    <div>
        <p> {{ $apartment->description }}</p>
    </div>
    @endforeach

</div>


@endsection
