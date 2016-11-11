<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionsModel extends Model
{
    protected $table = 'questions';
    protected $fillable = ['title','content','user_id','category_id'];

    public function category()
    {
        return $this->belongsTo('App\Models\CategoryModel');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
