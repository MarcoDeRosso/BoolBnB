<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    public function payment(){
        return $this->hasMany(Payment::class);
    }
}
