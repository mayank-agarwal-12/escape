<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationMapperModel extends Model
{
    protected $table = 'application_mapper';
    public $timestamps = false;
    protected $fillable = ['application_device_id','testcase_id'];
}
