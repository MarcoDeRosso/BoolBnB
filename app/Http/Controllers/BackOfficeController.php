<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Message;
use App\Service;
use App\Sponsor;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BackOfficeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth'); 
    }

    public function index()
    {
        $current_user_id = Auth::id();
        $apartments = Apartment::where('user_id',$current_user_id)->get();
        $now= new Carbon();
        $time= Carbon::now('Europe/Rome');
        foreach($apartments as $apa) {
            if($apa->visible){
                $apa->visible = 'Si';
            } else {
                $apa->visible = 'No';
            }
            if($apa->sponsorActive){
                $apa->sponsorActive = 'Si';
            } else {
                $apa->sponsorActive = 'No';

            }
        }
        return view('apartments.index', compact('apartments', 'time'));
    }
    
    public function create()
    {
        $apartments= Apartment::all();
        $services = Service::all();
        return view('apartments.create', compact('apartments', 'services'));
    }

 
    public function store(Request $request)
    {
        $apartment = new Apartment();
        $this->fillAndSave($request, $apartment);
        return redirect()->route('apartmentShow', $apartment);
    }

    public function show($id)
    {
        $apartment= Apartment::find($id);
        $payment= Payment::where('apartment_id','=', $apartment->id)->get();
        $payment=$payment->toArray();
        //dd($payment);

        $allDate = (DB::table('statistics')->select('created_at')->groupBy('created_at')->get())->toArray();
        $newDate = []; //ho tutte le date presenti nel db, in formato Y-m-d
        foreach($allDate as $dat){
            $dat = substr($dat->created_at,0,-9); 

            $dat =str_replace('-','/',$dat);
            if(!in_array($dat, $newDate)) {
                $newDate[] = $dat;
            }
        }

        // restituisce il numero di visualizzazioni per giorno
        //DB::table('statistics')->whereDate('created_at', '2021-10-15')->count(); 

        $statisticByDay =[];   //array posizione 0 giorno, posizione 1 totale visite

        foreach($newDate as $date) {
            $statisticForThisDay = DB::table('statistics')->whereDate('created_at', $date)->count();
            // $statisticByDay[] =array($date => $statisticForThisDay);
            $statisticByDay[]=array($date, $statisticForThisDay);
            // $statisticByDay[]=array('x' => $date, 'y' =>$statisticForThisDay);

        }
    
        // dd($statisticByDay);
        return view('apartments.show', compact('apartment','payment','statisticByDay'));
    }


    public function edit(Apartment $apartment)
    {
        $services = Service::all();
        return view('apartments.edit', compact('apartment','services'));
        
    }


    public function update(Request $request, Apartment $apartment)
    {
        $this->fillAndSave($request, $apartment);
        return redirect()->route('apartmentShow', $apartment);
    }


    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        return redirect()->route('apartments.index');
    }

    public function toSponsor ($id) {

        $apartment = Apartment::find($id);
        $sponsors = Sponsor::all();

        return view('apartments.sponsor', compact('apartment','sponsors'));

    }
    
    private function fillAndSave (Request $request, Apartment $apartment) {
        
        $data= $request->all();

        $coordinate= $this->getGeoCode($data['address']);
        // dd($data);

        $request->validate([
            'title' => 'required|string|max:50',
            'description' =>'required|string|max:65000',
            'rooms_num'=> 'required|numeric|max:255',
            'beds_num'=> 'required|numeric|max:255',
            'bath_num'=> 'required|numeric|max:255',
            'meters_size'=> 'required|numeric|max:65000',
            'address'=> 'required|string|max:65000',
            'price_night'=>'required|numeric|max:65000'
        ]);

        $apartment->user_id = Auth::id();
        $apartment->title = $data['title'];
        $apartment->description = $data['description'];
        $apartment->rooms_num = $data['rooms_num'];
        $apartment->beds_num = $data['beds_num'];
        $apartment->bath_num = $data['bath_num'];
        $apartment->meters_size = $data['meters_size'];
        $apartment->address = $data['address'];
        $apartment->visible = $data['visible'];
        $apartment->latitude = $coordinate['lat'];
        $apartment->longitude = $coordinate['lon'];


        
        
        if(array_key_exists('img_path',$data))
        {
            $picturePath = Storage::put('img', $data['img_path']);
            $apartment->img_path  = $picturePath; 
        };
        
        $apartment->price_night = $data['price_night'];        
        
        $apartment->save();
        
        if(array_key_exists('services',$data))
        {
            $apartment->service()->sync($data['services']);
        };
    }
    private function getGeoCode($address)
    {
        // 'https://api.tomtom.com/search/2/geocode/'+this.address+'.json?limit=1&key=RagRFtF86mML8SeN6kqbSiihdZpGAE1d'
        // geocoding api url
        $url = "https://api.tomtom.com/search/2/geocode/$address.json?limit=1&key=RagRFtF86mML8SeN6kqbSiihdZpGAE1d";
        // send api request
        $geocode = file_get_contents($url);
        $json = json_decode($geocode);
        //dd($json->results[0]->position->lat);
        $coordinate['lat'] = $json->results[0]->position->lat;
        $coordinate['lon'] = $json->results[0]->position->lon;
        //dd($coordinate);
        return $coordinate;
    }
}

