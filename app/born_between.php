<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class born_between extends Model
{
    protected $table="born_between";

    public function born_between_year()
    {
    	return $this->HasMany('App\born_between_year','id_born','id');
    }

    
}
