<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function Section() {
        return $this->belongsTo('App\Section');
    }

    public function Choices() {
        return parent::hasMany('App\Choice');
    }

    public function Answers() {
        return parent::hasMany('App\Answer');
    }
}
