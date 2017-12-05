<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    /**
     * @var string
     */
    public $title = '';

    /**
     * @var array<Persmission>
     */
    public $permissions;

    public function permissions(){
        return $this->hasMany(Permission::class);
    }
}
