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

        $listServicesArray =[];
        foreach($apartments as $apartment) {
            $listServices =($apartment->service()->where('apartment_id','=', $apartment->id)->get())->toArray();

            foreach($listServices as $service){
                $listServicesArray[] = $service['id'];               
            }
            $lista[] = $listServicesArray;            
            $listServicesArray=[];
        }    
        $apartmentsSponsored = DB::table('payments')
                                ->leftJoin('apartments','payments.apartment_id', '=', 'apartments.id')
                                ->where('expire_date', '>', '2021-10-15')
                                ->get();
        return view('welcome', compact('apartmentsSponsored', 'apartments'));
    }
    
}
