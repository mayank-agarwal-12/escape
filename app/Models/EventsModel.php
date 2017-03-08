<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventsModel extends Model
{
    protected $table='events';
    protected $guarded = ['token'];


    public function partners()
    {
        return $this->belongsTo('App\Models\PartnersModel','partner_id');
    }

    public function users()
    {
        return $this->belongsToMany('App\Models\UserEventsModel','user_event','event_id','user_id');
    }

}
