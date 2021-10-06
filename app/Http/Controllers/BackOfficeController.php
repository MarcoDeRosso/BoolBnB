<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Service;
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
        return view('apartments.index', compact('apartments'));
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
        return redirect()->route('apartments.show', $apartment);
    }


    // public function show($id)
    // {
    //     $apartment= Apartment::find($id);
    //     return view('apartments.show', compact('apartment'));
    // }


    public function edit(Apartment $apartment)
    {
        $services = Service::all();
        return view('apartments.edit', compact('apartment','services'));
        
    }


    public function update(Request $request, Apartment $apartment)
    {
        $this->fillAndSave($request, $apartment);
        return redirect()->route('apartments.show', $apartment);
    }


    public function destroy(Apartment $apartment)
    {
        $apartment->delete();
        return redirect()->route('apartments.index');
    }

    private function fillAndSave (Request $request, Apartment $apartment) {
        
        $data= $request->all();
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
}