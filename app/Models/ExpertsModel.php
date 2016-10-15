<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpertsModel extends Model
{
    protected $table = 'experts';
    //protected $fillable = ['name','email','mobile'];
    protected $guarded = ['category_id'];
}
