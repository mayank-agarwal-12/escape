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
}
