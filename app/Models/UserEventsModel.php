<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserEventsModel extends Model
{
    protected $table = 'user_event';
    public $timestamps =false;
    protected $fillable = ['user_id','event_id'];

}
