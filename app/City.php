<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    function state(){
        return $this->belongsTo(State::class);
    }

    function translations(){
        return $this->hasMany(TranslationCity::class);
    }
}
