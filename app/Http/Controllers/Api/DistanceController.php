<?php

namespace App\Http\Controllers\Api;

use App\Apartment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DistanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data=$request->all();
        $apartments= Apartment::all();
        $city=$data['city'];
        $distance=$data['radius'];
        $coordinate= $this->getGeoCode($city);
        //dd($coordinate);

        foreach($apartments as $apa){
            //dd($apa->longitude);
            $range=sqrt(pow($coordinate['lon']-$apa->longitude,2)+pow($coordinate['lat']-$apa->latitude,2))*111;
            //dd($range);
            if($range<=$distance){
                $apartmentsInRange[]=$apa;
            }
        };
       //dd($apartmentsInRange);
       return response()->json($apartmentsInRange);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
