<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PartnersModel extends Model
{
    protected $table='partners';
    protected $guarded = ['image'];

    public function image()
    {
        return $this->belongsTo('App\Models\UploadModel','logo_id');
    }

    public function events()
    {
        return $this->hasMany('App\Models\EventsModel','partner_id','id');
    }

}
