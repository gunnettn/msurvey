<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Responder extends Model
{
    public function Answers() {
        return parent::hasMany('App\Answer');
    }

    public function Survey() {
        return $this->belongsTo('App\Survey');
    }
}
