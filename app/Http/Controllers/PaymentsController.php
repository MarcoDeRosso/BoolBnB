<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Braintree\Transaction;
use Braintree\Gateway;
use App\Payment;
use App\Sponsor;
use App\Apartment;

class PaymentsController extends Controller
{
  public function make(Request $request)
  {
    $data = $request->all();
    $sponsor = Sponsor::find($data['sponsor']);
    $apartment = Apartment::find($data['apa']);

    $payload = $request->input('payload', false);
    $nonce = $payload['nonce'];
    $gateway = $this->brainConfig();
    $status = $gateway->transaction()->sale([
      'amount' => $sponsor->cost,
      'paymentMethodNonce' => $nonce,
      'options' => [
        'submitForSettlement' => True
      ]
    ]);

    if ($status->success) {

      $payment = new Payment();
      $payment->apartment_id = $apartment->id;
      $payment->sponsor_id = $sponsor->id;
      $payment->expire_date = '2199-10-10';
      $payment->total = $sponsor->cost;
      $payment->status = true;
      $payment->save();

      return response()->json($status);
    } else {

      $payment = new Payment();
      $payment->apartment_id = $apartment->id;
      $payment->sponsor_id = $sponsor->id;
      $payment->expire_date = '2199-10-10';
      $payment->total = $sponsor->cost;
      $payment->status = false;
      $payment->save();

      return response()->json($status);
    }
  }

  public function getPaymentToken()
  {
    $gateway = $this->brainConfig();
    $result = $gateway->paymentMethodNonce()->create('7s8q8f');
    echo $result->paymentMethodNonce->nonce;
  }

  public function brainConfig()
  {
    return new Gateway([
      'environment' => env('BRAINTREE_ENV'),
      'merchantId' => env('BRAINTREE_MERCHANT_ID'),
      'publicKey' => env('BRAINTREE_PUBLIC_KEY'),
      'privateKey' => env('BRAINTREE_PRIVATE_KEY')
    ]);
  }
}
