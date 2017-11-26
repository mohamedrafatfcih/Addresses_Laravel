<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{

    function cities(){
        return $this->hasMany(City::class);
    }

    function country(){
        return $this->belongsTo(Country::class);
    }

    function translation(){
        return $this->hasMany(TranslationState::class);
    }
}
