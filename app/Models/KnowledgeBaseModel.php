<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KnowledgeBaseModel extends Model
{
    protected $fillable = [
        'title', 'description','link','category_id','user_id'
    ];

    protected $table = 'knowledgebase';
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\Models\CategoryModel');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
