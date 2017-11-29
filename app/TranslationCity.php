<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TranslationCity extends Model
{
    protected $table = "translations_states";
    public function city(){
        return $this->belongsTo(City::class,'source_id','id');
    }
}
