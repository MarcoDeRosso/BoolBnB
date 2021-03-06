<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{    
    public function store(Request $request)
    {
        $request->validate([
            'full_name'=> 'required',
            'email'=> 'required',
            'text' => 'required|max:65500'
        ]);

        $data= $request->all();

        $message = new Message();
        $message->full_name=$data['full_name'];
        $message->email=$data['email'];
        $message->text=$data['text'];
        $message->apartment_id= $data['id'];
        $message->save();

        return redirect()->route('apartmentShow', $data['id']);
    }
    public function destroy(Message $message)
    {   
        $apartment = Apartment::find($message->apartment_id);
        // dd($message->data);
        $message->delete();
        return redirect()->route('apartments.show',$apartment);
    }
}
