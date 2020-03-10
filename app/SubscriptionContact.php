<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriptionContact extends Model
{
    protected $fillable = [
        'type',
        'name',
        'phone',
        'email'
    ];
    protected $table = 'subscription_contact';

    public function subscription() {
        return $this->belongsTo('App\Subscription');
    }
}
