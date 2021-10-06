<?php

namespace App\Http\Controllers;

use App\Apartment;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $apartments= Apartment::all();

        foreach($apartments as $apartment) {
            $apartment->description=$this->cutText($apartment->description);
        }
        return view('home', compact('apartments'));        
    }


    private function cutText ($text) {
        $cutText = substr($text,0, 200);
        $cutText =  $cutText . "...";
        return $cutText;
    }
}
