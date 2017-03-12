<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    public function Sections() {
        return parent::hasMany('App\Section');
    }

    public function Responders() {
        return parent::hasMany('App\Responder');
    }
}
