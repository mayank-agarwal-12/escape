<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TagsMappingModel extends Model
{
    public $timestamps = false;
    protected $fillable = ['tags_id','comparison_id'];
    protected $table = 'tags_mapping';
}
