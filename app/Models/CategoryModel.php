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
        return $this->belongsTo('App\Models\CategoryModel');
    }

    public function category()
    {
        return $this->hasMany('App\Models\CategoryModel');
    }


}
