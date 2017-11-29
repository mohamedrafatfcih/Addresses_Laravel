<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TranslationCountry extends Model
{
    protected $table = "translations_countries";
    public  function country(){
        return $this->belongsTo(Country::class,'source_id','id');
    }
}
