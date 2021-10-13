@extends('layouts.app')

@section('content')
<form action="{{ route('sponsor.store', $apartment->id) }}" method='POST' >
@csrf
<div class="container">
  {{$apartment->id}}
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
        <button type="submit" id="submit-button">Request payment method</button>
      </div>
    </div>
  </div>
</div>
</form>

{{-- <div class="container">

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


</div> --}}


@endsection
@section('script')
    <script>
        setTimeout(() => {
            var button = document.querySelector('#submit-button');

            braintree.dropin.create({
            authorization: "{{ Braintree\ClientToken::generate() }}",
            container: '#dropin-container'
            }, function (createErr, instance) {
            button.addEventListener('click', function () {
                instance.requestPaymentMethod(function (err, payload) {
                $.get("{{ route('payment.make') }}", {payload}, function (response) {
                    if (response.success) {
                    alert('Payment successfull!');
                    } else {
                    alert('Payment failed');
                    }
                }, 'json');
                });
            });
            });
            
        }, 1000);
    </script>
@endsection