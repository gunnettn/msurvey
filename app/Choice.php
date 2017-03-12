<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    public function Question() {
        return $this->belongsTo('App\Question');
    }

    public function Answers() {
        return parent::hasMany('App\Answer');
    }
}
