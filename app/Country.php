<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    public  function states(){
        return $this->hasMany(State::class);
    }

    public function translations(){
        return $this->hasMany(TranslationCountry::class,'source_id','id');
    }

    public function localPrefixes(){
        return $this->hasMany(LocalNumberPrefix::class,'','');
    }
}
