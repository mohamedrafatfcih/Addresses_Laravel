<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    function states(){
        return $this->hasMany(State::class);
    }

    function translations(){
        return $this->hasMany(TranslationCountry::class);
    }
}
