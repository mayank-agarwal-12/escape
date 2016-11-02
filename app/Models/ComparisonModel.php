<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ComparisonModel extends Model
{
    public $timestamps = false;
    protected $fillable = ['upload_id'];
    protected $table = 'comparison';

    public function upload()
    {
        return $this->belongsTo('App\Models\UploadModel','upload_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\TagsModel','tags_mapping','comparison_id','tags_id');
    }
}
