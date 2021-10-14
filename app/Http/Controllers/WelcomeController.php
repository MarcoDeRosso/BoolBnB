<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Apartment;
use App\Service;


class WelcomeController extends Controller
{
    public function welcome () {
        $apartments= Apartment::paginate(6);
        $services = Service::all();
  
        $now = date("Y-m-d H-i-s");

        $apartmentsSponsored = DB::table('payments')
                                ->leftJoin('apartments','payments.apartment_id', '=', 'apartments.id')
                                ->where('expire_date', '>', '2021-10-15')
                                ->get();
        return view('welcome', compact('apartmentsSponsored', 'apartments'));
    }
    
}
