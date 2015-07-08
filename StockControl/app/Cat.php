<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    public function subcats()
    {
        return $this->hasMany('App\Subcat')->orderBy('name', 'asc');
    }
}
