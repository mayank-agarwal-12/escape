<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KnowledgeBaseModel extends Model
{
    /*protected $fillable = [
        'title', 'description','user_id'
    ];*/

    protected $table = 'knowledgebase';
    protected $guarded = ['image'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function image()
    {
        return $this->belongsTo('App\Models\UploadModel','upload_id');
    }
}
