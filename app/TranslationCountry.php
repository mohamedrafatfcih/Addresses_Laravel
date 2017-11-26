<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TranslationCountry extends Model
{
    function country(){
        return $this->belongsTo(Country::class);
    }
}
