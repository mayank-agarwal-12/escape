<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KnowledgeBaseModel extends Model
{
    protected $fillable = [
        'title', 'description','link','category_id'
    ];

    protected $table = 'knowledgebase';
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo('App\Models\CategoryModel');
    }
}
