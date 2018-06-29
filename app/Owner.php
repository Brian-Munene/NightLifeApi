<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Owner extends Model
{
    public function chillspot(){
        return 
        $this->hasMany('App\Chillspot');
    }
}
