<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TranslationState extends Model
{
    function state(){
        return $this->belongsTo(State::class);
    }
}
