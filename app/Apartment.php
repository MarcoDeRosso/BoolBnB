<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function statistic(){
        return $this->hasMany(Statistic::class);
    }
    public function message(){
        return $this->hasMany(Message::class);
    }
    public function payment(){
        return $this->hasMany(Payment::class);
    }
    public function service(){
        return $this->belongsToMany(Service::class);
    }
}
