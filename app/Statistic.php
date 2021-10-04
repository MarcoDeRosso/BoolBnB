<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Statistic extends Model
{
    public function apartment(){
        return $this->belongsTo(Apartment::class);
    }
}
