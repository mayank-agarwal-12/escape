<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryExpertModel extends Model
{
    protected $table = 'category_expert';
    public $timestamps =false;
    protected $fillable = ['category_id','expert_id'];

}
