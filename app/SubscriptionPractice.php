<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPractice extends Model
{
    protected $fillable = [
        'practice_category',
        'subgroup_id',
        'name',
        'area',
        'resume',
        'criteria_questions',
        'implantation_start_dt',
        'results',
        'stakeholders',
    ];
    protected $table = 'subscription_practice';

    public function subscription() {
        return $this->belongsTo('App\Subscription');
    }
}
