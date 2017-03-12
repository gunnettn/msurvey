<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function Responder() {
        return $this->belongsTo('App\Responder');
    }

    public function Choice() {
        return $this->belongsTo('App\Choice');
    }

    public function Question() {
        return $this->belongsTo('App\Question');
    }
}
