<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewsModel extends Model
{
    protected $table = 'reviews';
    protected $guarded = ['image'];

    public function category()
    {
        return $this->belongsTo('App\Models\CategoryModel');
    }

    public function user()
    {
       // return $this->belongsTo('App\Models\Users');
    }

    public function image()
    {
        return $this->belongsTo('App\Models\UploadModel','upload_id');
    }


}
