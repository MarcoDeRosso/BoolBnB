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
        $allDate = (DB::table('statistics')->select('created_at')->groupBy('created_at')->get())->toArray();
        $newDate = []; //ho tutte le date presenti nel db, in formato Y-m-d
        foreach($allDate as $dat){
            $dat = substr($dat->created_at,0,-9); 
            if(!in_array($dat, $newDate)) {
                $newDate[] = $dat;
            }
        }

        // restituisce il numero di visualizzazioni per giorno
        //DB::table('statistics')->whereDate('created_at', '2021-10-15')->count(); 

        $statisticByDay =[];   //array chiave valore, 'giorno' 'totale visite'

        foreach($newDate as $date) {
            $statisticForThisDay = DB::table('statistics')->whereDate('created_at', $date)->count();
            $statisticByDay[] =array($date => $statisticForThisDay);
        }
        

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
        
        return view('show', compact('apartment','statisticByDay'));        
    }
}