<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'parent_id'
    ];

    protected $table = 'categories';

    public function parent()
    {
        return $this->hasOne('App\Models\CategoryModel');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\CategoryModel');
    }

    public function experts()
    {
        return $this->belongsToMany('App\Models\ExpertsModel','category_expert','category_id','expert_id');
    }



}
