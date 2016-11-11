<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnswersModel extends Model
{
    protected $table = 'answers';
    protected $fillable = [
        'content','question_id','expert_id'
    ];

    public function questions()
    {
        return $this->belongsTo('App\Models\QuestionsModel');
    }

    public function expert()
    {
        return $this->belongsTo('App\Models\ExpertsModel');
    }
}
