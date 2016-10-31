<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KnowledgeBaseModel extends Model
{
    protected $fillable = [
        'title', 'description','link'
    ];

    protected $table = 'knowledgebase';
    public $timestamps = false;
}
