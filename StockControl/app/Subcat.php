<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcat extends Model
{
    public function cat()
    {
        return $this->belongsTo('App\Cat');
    }
}
