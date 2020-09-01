<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmNewsCategory extends Model
{
    public function news()
    {
        return $this->hasManyThrough('App\SmNews','App\SmNewsSubCategory','category_id','sub_category_id','id','id');
    }

    public function subCate()
    {
        return $this->hasMany('App\SmNewsSubCategory','category_id','id');
    }
}
