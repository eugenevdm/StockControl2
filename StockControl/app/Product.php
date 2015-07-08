<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function cat() {
        return $this->hasOne('App\Cat');
    }

    public function subcategory()
    {
        return $this->belongsTo('App\Subcat');
    }

    public function supplier()
    {
        return $this->belongsToMany('App\Supplier');
    }

}
