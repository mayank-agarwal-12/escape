<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpertsModel extends Model
{
    protected $table = 'experts';
    //protected $fillable = ['name','email','mobile'];
    protected $guarded = ['categories'];

    public function category()
    {
        return $this->belongsToMany('App\Models\CategoryModel','category_expert','expert_id','category_id');
    }
}
