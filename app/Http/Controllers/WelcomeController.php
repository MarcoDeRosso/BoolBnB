<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Apartment;
use App\Payment;
use App\Service;
use Carbon\Carbon;

class WelcomeController extends Controller
{
    public function welcome () {
        $apartments= Apartment::paginate(6);
        $services = Service::all();
        $payments = Payment::all();
        $now= new Carbon();
        $time= Carbon::now();
        //$pagamentiAttiviProprioScrittoInItaliano= DB::table('apartments')
                                //->where('sponsorActive','1')
                                //->get();
        //dd($pagamentiAttiviProprioScrittoInItaliano);
        //dd($time);
        foreach($payments as $date){
            if($date->expire_date < $time){
                $apa= Apartment::find($date->apartment_id);
                $apa->sponsorActive=false;
                $apa->save();
            }
        }
        $apartmentsSponsored = DB::table('payments')
                                ->leftJoin('apartments','payments.apartment_id', '=', 'apartments.id')
                                ->where('expire_date', '>', '2021-10-15')
                                ->get();
        return view('welcome', compact('apartmentsSponsored', 'apartments'));
    }
    
}
