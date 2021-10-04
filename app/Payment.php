<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function apartment(){
        return $this->belongsTo(Apartment::class);
    }
    public function sponsor(){
        return $this->belongsTo(Sponsor::class);
    }
}
