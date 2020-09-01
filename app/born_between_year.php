<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class born_between_year extends Model
{
    protected $table="bornbetween_year";

    public function born_between()
    {
    	return $this->BelongsTo('App\born_between','id_born','id');
    }

     public function years()
    {
    	return $this->BelongsTo('App\SmAcademicYear','id_year','id');
    }
}
