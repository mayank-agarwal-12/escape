<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ApplicationDevicesModel extends Model
{
    protected $guarded = ['testcases'];
   protected $table = 'application_devices';
    public $timestamps=false;

    public function testcases()
    {
        return $this->belongsToMany('App\Models\TestCasesModel','application_mapper','application_device_id','testcase_id');
    }
}
