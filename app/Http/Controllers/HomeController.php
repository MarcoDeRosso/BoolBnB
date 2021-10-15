<?php

namespace App\Http\Controllers;
use App\Apartment;
use App\Service;
use App\Statistic;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $apartments= Apartment::all();
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
        return view('home', compact('apartments','services','lista'));       
    }

    public function show($id)
    {
        $apartment= Apartment::find($id);
        $today=date('Y-m-d');
        //$ip=Hash::make($_SERVER['REMOTE_ADDR']);
        $ip=$_SERVER['REMOTE_ADDR'];
        
        //pluck restituisce solo una colonna del db
        $ipList=DB::table('statistics')->whereDate('created_at', $today)->pluck('guest_ip');
        if(!$ipList->contains($ip)){
          $statistic=new Statistic(); 
          $statistic->apartment_id=$id;
          $statistic->guest_ip=$ip;
          $statistic->save(); 
        }

        return view('show', compact('apartment'));        
    }
}