@extends('layouts.app')

@section('content')
<div class="container text-center">

@if ($apartment->sponsorActive)

<h1>La sponsorizzazione è già attiva!</h1>
<a href="{{ route('apartments.show', $apartment) }}">
  <button>Torna in dietro</button>
</a>  

@else

<!-- The Modal -->
<div id="myModal" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <h1 id="h1-text-modal"></h1>
    <a href="{{ route('apartments.show', $apartment) }}">
      <button class="btn-route bn632-hover bn26">Chiudi</button>
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
        <div class="all-cards card card-bg col-5 col-lg-3">
          <div class="card-body">
            <div class="flip-card-front mt-4">
              <h6 class="bronze">Pacchetto {{$sponsor->name}}</h6>
              <h1><i class="fas fa-medal"></i></h1>
              <h6>&#8364; {{$sponsor->cost}} </h6>               
            </div>
            <div class="form-check flip-card-back bnb-formCheck mt-2">
              <div class="color">
                <i class="fas fa-medal"></i>
                <h6>Appartamento sponsorizzato per {{$sponsor->hours}} ore</h6>
                <h6>&#8364; {{$sponsor->cost}} </h6>
              </div>
              <label class="form-check-label" for="sponsor_id"></label>
              <input class="sponsor-type bnb-sponsorType" type="radio"  name="sponsor_id" id="sponsor_id" value="{{$sponsor->id}}" >
              {{-- <label class="form-check-label" for="sponsor_id"></label>
              <input class="form-check-input sponsor-type bnb-sponsorType" type="radio"  name="sponsor_id" id="sponsor_id" value="{{$sponsor->id}}" > --}}
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
    <div class="col-12">
      <h3 class="pt-2" id="total-to-pay" style="visibility: hidden;"></h3 class="pt-2">

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
          let textModal = document.getElementById('h1-text-modal');

          // x modal ->button invere con redirect
          var span = document.getElementsByClassName("btn-route")[0];

          var total = document.getElementById('total-to-pay');
          var button = document.getElementById('submit-button');
          var nameSponsor = '';
          var price = 0;
          var apa = {{ $apartment->id }};
          var radioButtons = document.getElementsByClassName('sponsor-type');
          let sponsor = '';
          var cards= document.getElementsByClassName('all-cards');
          for(let y=0; y< cards.length; y++){
            cards[y].addEventListener('click', function(){
              radioButtons[y].checked=true;
              sponsor = radioButtons[y].value;

              if (sponsor == 1) {
                nameSponsor = 'Bronzo'
                price = 2.99

              } else if (sponsor == 2) {
                nameSponsor = 'Argento'
                price = 5.99

              } else {
                nameSponsor = 'Oro'
                price = 9.99
              }

              total.style.visibility= "visible";
              total.innerHTML =
              total.innerHTML = "Complimenti! Hai scelto il pacchetto <b> " + nameSponsor + "</b> <br> Totale da pagare " + price + " &#8364;";
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
                    textModal.innerHTML = "Il pagamento è andato a buon fine";
                  } else {
                    modal.style.display = "block";
                    textModal.innerHTML = "Il pagamento non è riuscito";

                   }
                  }, 'json');
                });
            });
          });
            
        }, 1000);
    </script>
@endsection