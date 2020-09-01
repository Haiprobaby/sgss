<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SmNewsSubCategory extends Model
{
    protected $table="sm_news_sub_categories";

    public function news()
    {
        return $this->hasMany('App\SmNews','sub_category_id','id');
    }

    public function NewsCategory()
    {
        return $this->BelongsTo('App\SmNewsCategory','category_id','id');
    }


}
