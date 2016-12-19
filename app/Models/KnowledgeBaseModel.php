<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KnowledgeBaseModel extends Model
{
    protected $fillable = [
        'title', 'description','user_id'
    ];

    protected $table = 'knowledgebase';

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
