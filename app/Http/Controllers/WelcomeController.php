<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Apartment;

class WelcomeController extends Controller
{
    public function welcome () {
        // $apartments = Apartment::all()->payment()->where('status','1')->get();
        // dd($apartments);
        // $appartamentiInSponsor = $apartments->payment()->whereDate('expire_date','>','2021-10-15')->get();

        $apartmentsSponsored = DB::table('payments')
                                ->leftJoin('apartments','payments.apartment_id', '=', 'apartments.id')
                                ->where('expire_date', '>', '2021-10-15')
                                ->get();

        // dd($apartmentsSponsored);

        return view('welcome', compact('apartmentsSponsored'));
    }
}
