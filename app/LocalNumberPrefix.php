<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class LocalNumberPrefix extends Model
{
    protected $table = "";

    public function country(){
        return $this->belongsTo(Country::class);
    }
}
