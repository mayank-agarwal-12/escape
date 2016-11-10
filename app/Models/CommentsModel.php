<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CommentsModel extends Model
{
    protected $table = 'comments';
    protected $fillable = [
        'content','review_id','user_id'
    ];

    public function reviews()
    {
        return $this->belongsTo('App\Models\ReviewsModel');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
