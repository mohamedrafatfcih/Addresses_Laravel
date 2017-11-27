<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TranslationState extends Model
{
    protected $table = "translations_states";
    public function state(){
        return $this->belongsTo(State::class);
    }
}
