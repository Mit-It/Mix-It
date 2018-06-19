<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{


    protected $fillable = array('title', 'picture');

    public function cocktail(){
        return $this->belongsTo(Cocktails::class);
    }
}
