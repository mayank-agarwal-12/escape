<?php

namespace App;

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
        return $this->belongsTo('App\CategoryModel');
    }

    public function category()
    {
        return $this->hasMany('App\CategoryModel');
    }


}
