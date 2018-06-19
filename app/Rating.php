<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{


    protected $fillable = array('value');


    public function cocktail(){
        return $this->belongsTo(Cocktail::class, 'cocktail_id');
    }

    public function createdByUser(){
        return $this->belongsTo(User::class, 'user_id');
    }

}