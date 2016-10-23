<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestCasesModel extends Model
{
    protected $fillable = ['name'];
    protected  $table = 'testcases';
    public $timestamps =false;
}
