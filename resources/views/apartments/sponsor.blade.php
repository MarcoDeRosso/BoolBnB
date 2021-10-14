@extends('layouts.app')

@section('content')
{{-- perchè il primo elemento dell'array non lo prense ? --}}
{{-- <form action="{{ route('sponsor.store', ['id'=>$apartment->id]) }}" method='POST' > --}}
{{-- @csrf --}}
  <div class="container">
    <div id="sponsorships" class="container">
      <div class="col-md-8">
        <div class="row justify-content-around">
          @foreach ($sponsors as $sponsor)
          <div class="card col-12 col-lg-3">
            <div class="card-body">
              <div class="form-check bnb-formCheck">
                <div class="color">
                  <h6 class="bronze">Pacchetto {{$sponsor->name}}</h6>
                  <i class="fas fa-medal"></i>
                  <h6>Appartamento sponsorizzato per {{$sponsor->hours}} ore</h6>
                  <h6>&#8364; {{$sponsor->cost}} </h6>
                </div>
                <label class="form-check-label" for="sponsor_id"></label>
                <input class="form-check-input sponsor-type bnb-sponsorType" type="radio"  name="sponsor_id" id="sponsor_id" value="{{$sponsor->id}}" >
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  {{-- <button> Vai al pagamento </button> --}}
{{-- </form> --}}
<div class="container bnb-totalMain">
  <div class="bnb-mainPayment">
    <div class="bnb-totalContainer">
      <div class="bnb-text col-md-8">
        <h1>Sponsorizza il tuo appartamento!</h1>
          <p>Sponsorizza ora il tuo appartamento e questo verrà mostrato per primo nella homepage</p>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        <div id="dropin-container"></div>
        <button id="submit-button">Request payment method</button>
      </div>
    </div>
  </div>
</div>
@endsection
@section('script')
    <script>
        setTimeout(() => {
          var button = document.getElementById('submit-button');
          var apa = {{ $apartment->id }};
          console.log(apa);
          var radioButtons = document.getElementsByClassName('sponsor-type');
          let sponsor = '';

          braintree.dropin.create({
            authorization: "{{ Braintree\ClientToken::generate() }}",
            // container: '#dropin-container'
            container: document.getElementById('dropin-container')
          },function(createErr, instance) {
            button.addEventListener('click', function() {
              for (let x = 0; x < radioButtons.length; x++) {
                if (radioButtons[x].checked) {
                  sponsor = radioButtons[x].value;
                  console.log('dentro if',sponsor);
                }
                console.log('dentro for',sponsor);
              }
              console.log('sono fuori',sponsor);
              instance.requestPaymentMethod(function(err, payload) {
                $.get('{{route('payment.make') }}', {
                  payload,
                  sponsor,
                  apa
                },
                function(response) {
                  if (response.success) {
                    alert('Pagamento riuscito!');
                  } else {
                    alert('Transazione fallita, riprova piu tardi!');
                   }
                  }, 'json');
                });
            });
          });
            
        }, 1000);
    </script>
@endsection