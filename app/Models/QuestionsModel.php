<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuestionsModel extends Model
{
    use SoftDeletes;
    protected $table = 'questions';
    protected $fillable = ['title','content','user_id','category_id'];
    protected $dates = ['deleted_at'];



    public function category()
    {
        return $this->belongsTo('App\Models\CategoryModel');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
