<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommentsModel extends Model
{
    use SoftDeletes;
    protected $table = 'comments';
    protected $fillable = [
        'content','review_id','user_id'
    ];
    protected $dates = ['deleted_at'];

    public function reviews()
    {
        return $this->belongsTo('App\Models\ReviewsModel','review_id');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
