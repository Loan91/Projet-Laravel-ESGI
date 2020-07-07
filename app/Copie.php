<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Copie extends Model
{
    protected $table = 'film_user';
    protected $primaryKey = 'id';

    public function film(){

        return $this->belongsTo('App\Film', 'film_id');
    }

    public function user(){

        return $this->belongsTo('App\User', 'user_id');
    }

    public function users(){

        return $this->belongsToMany('App\User', 'user_id');
    }
}
