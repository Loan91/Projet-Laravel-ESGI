<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    public function copie(){

        return $this->belongsTo('App\Copie', 'videotheque_id');
    }

    public function user(){

        return $this->belongsTo('App\User', 'emprunteur_id');
    }
}
