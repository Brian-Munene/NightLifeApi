<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chillspot extends Model
{
    public $table = 'chillspot';
    public function owner(){
        return $this->belongsTo('App\Owner');
    }
}
