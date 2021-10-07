@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $apartment->title }}</h1>
    
    <div>
        @foreach ($apartment->service as $service)
        <span class="badge badge-pill badge-success">{{ $service->title }}</span>
            
        @endforeach
    </div>
    <img class="mt-3 mb-3" src="{{ $apartment->img_path }}" alt="" style="width: 100%">
    <div>
        <p> {{ $apartment->description }}</p>
    </div>


 {{-- MESSAGES --}}

    <div>
        <h3>Invia un messaggio all'Host</h3>

        @if ($errors->any())
        <ul>
        @foreach ($errors->all() as $error)
            <li> {{ $error }}</li>
        @endforeach
        </ul>
        @endif

        <form action="{{ route('messages.store', ['id'=>$apartment->id]) }}" method='POST'>
            @csrf

            <div class="form-group">
                <label for="full_name">Nome:</label>
                <input type="text" class="form-control" name="full_name" id="full_name">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" id="email">
            </div>

            <div class="form-group">
                <label for="text">Testo:</label> <br>
                <textarea style="width:100%;" rows="5" name="text" id="text" placeholder="Scrivi qui il tuo messaggio"></textarea>
            </div>
            <button type="submit" class="btn btn-success">Invia Messaggio</button>
        </form>
    </div>


</div>
@endsection