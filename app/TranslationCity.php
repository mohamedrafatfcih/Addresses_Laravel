<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TranslationCity extends Model
{
    public function city(){
        return $this->belongsTo(City::class);
    }
}
