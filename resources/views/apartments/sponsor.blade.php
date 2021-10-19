@extends('layouts.app')

@section('content')
<div class="container text-center">

@if ($apartment->sponsorActive)

<h1>hai gia pagato</h1>
<a href="{{ route('apartments.show', $apartment) }}">
  <button>Torna in dietro</button>
</a>  

@else

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <p id="p-text-modal">Pagamento andato a buon fine</p>
    <a href="{{ route('apartments.show', $apartment) }}">
      <button class="btn-route">Chiudi</button>
    </a>
  </div>
</div>
<div class="row">
  <div class="col-12">
    <h1>Sponsorizza il tuo appartamento!</h1>
    <p>Aumenta la sua visilibità e ricevi più messaggi!</p>
  </div>
</div>

<div id="sponsorships">
  <div class="row">
    <div class="col-md-8">
      <div class="row justify-content-around">
        @foreach ($sponsors as $sponsor)
        <div class="all-cards card card-bg col-12 col-lg-3">
          <div class="card-body">
            <div class="flip-card-front">
              <h6 class="bronze">Pacchetto {{$sponsor->name}}</h6>
              <h1><i class="fas fa-medal"></i></h1>
              <h6>&#8364; {{$sponsor->cost}} </h6>               
            </div>
            <div class="form-check flip-card-back bnb-formCheck">
              <div class="color">
                <h6 class="title-color">Pacchetto {{$sponsor->name}}</h6>
                <i class="fas fa-medal"></i>
                <h6>Appartamento sponsorizzato per {{$sponsor->hours}} ore</h6>
                <h6>&#8364; {{$sponsor->cost}} </h6>
              </div>
              {{-- <label class="form-check-label" for="sponsor_id"></label>
              <input class="form-check-input sponsor-type bnb-sponsorType" type="radio"  name="sponsor_id" id="sponsor_id" value="{{$sponsor->id}}" > --}}
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class="row">        
    <div class="col-md-8">
      <div class="row justify-content-around ">
        @foreach ($sponsors as $sponsor)
        <div class="col-12 col-lg-3">              
          <label class="form-check-label" for="sponsor_id"></label>
          <input class="sponsor-type bnb-sponsorType" type="radio"  name="sponsor_id" id="sponsor_id" value="{{$sponsor->id}}" >
        </div>
        @endforeach
      </div>          
    </div>
  </div>
  </div>
</div>
  {{-- <button> Vai al pagamento </button> --}}
{{-- </form> --}}
<div class="container bnb-totalMain">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2 text-center mb-3">
        <div id="dropin-container"></div>
        <button class="bn632-hover bn21 show" id="submit-button">Invia pagamento</button>
      </div>
    </div>
  </div>
</div>
@endif
@endsection
@section('script')
    <script>
        setTimeout(() => {
          // modal
          var modal = document.getElementById('myModal');
          let textModal = document.getElementById('p-text-modal');

          // x modal ->button invere con redirect
          var span = document.getElementsByClassName("btn-route")[0];

          var button = document.getElementById('submit-button');
          var apa = {{ $apartment->id }};
          var radioButtons = document.getElementsByClassName('sponsor-type');
          let sponsor = '';
          var cards= document.getElementsByClassName('all-cards');
          for(let y=0; y< cards.length; y++){
            cards[y].addEventListener('click', function(){
              console.log('sono una carta!');
              radioButtons[y].checked=true;
              sponsor = radioButtons[y].value;
              console.log('sto controllando il valore',sponsor);
            })
          }
          braintree.dropin.create({
            authorization: "{{ Braintree\ClientToken::generate() }}",
            // container: '#dropin-container'
            container: document.getElementById('dropin-container')
          },function(createErr, instance) {
            button.addEventListener('click', function() {
              instance.requestPaymentMethod(function(err, payload) {
                $.get('{{route('payment.make') }}', {
                  payload,
                  sponsor,
                  apa
                },
                function(response) {
                  if (response.success) {
                    modal.style.display = "block";
                    textModal.innerHTML = "Pagamento riuscito";
                  } else {
                    textModal.innerHTML = "Pagamento non riuscito";

                   }
                  }, 'json');
                });
            });
          });
            
        }, 1000);
    </script>
@endsection