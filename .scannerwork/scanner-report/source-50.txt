<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Recipebook extends Model
{


    protected $fillable = array('title');


    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }


    public function cocktails(){
        return $this->belongsToMany(Cocktail::class);
    }
}