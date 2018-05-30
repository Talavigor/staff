<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    public function childs() {
        return $this->hasMany('App\Models\Employee','parent_id','id') ;
    }
}
