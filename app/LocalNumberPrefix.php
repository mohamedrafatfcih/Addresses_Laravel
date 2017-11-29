<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class LocalNumberPrefix extends Model
{
    protected $table = "country_number_perfixs";

    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }
}
