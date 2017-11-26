<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TranslationCountry extends Model
{
    public  function country(){
        return $this->belongsTo(Country::class);
    }
}
