<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    public function Survey() {
        return $this->belongsTo('App\Survey');
    }

    public function Questions() {
        return parent::hasMany('App\Question');
    }
}
