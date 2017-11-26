<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TranslationState extends Model
{
    public function state(){
        return $this->belongsTo(State::class);
    }
}
