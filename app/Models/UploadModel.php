<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UploadModel extends Model
{
    protected $table = 'uploads';
    protected $fillable = ['url','type','storage','path'];
}
