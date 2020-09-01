<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmFeesGroup extends Model
{
    protected $table = 'sm_fees_groups';
    
    public function feesMasters(){
        return $this->hasmany('App\SmFeesMaster', 'fees_group_id');
    }
    public function years()
    {
        return $this->hasMany('App\SmAcademicYear','id_group','id');
    }
    public function fees()
    {
        return $this->HasMany('App\sm_fees','fees_group','id');
    }
}
