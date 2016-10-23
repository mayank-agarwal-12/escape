<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestCasesModel extends Model
{
    protected $fillable = ['name'];
    protected  $table = 'testcases';
    public $timestamps =false;

    public function applicationdevices()
    {
        return $this->belongsToMany('App\Models\ApplicationDevices','application_mapper','testcase_id','application_device_id');
    }
}
