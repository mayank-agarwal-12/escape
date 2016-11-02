<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagsModel extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];
    protected $table = 'tags';

    public function comparison()
    {
        return $this->belongsToMany('App\Models\TagsModel','tags_mapping','tags_id','comparison_id');
    }
}
