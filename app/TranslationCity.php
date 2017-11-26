<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TranslationCity extends Model
{
    function city(){
        return $this->belongsTo(City::class);
    }
}
