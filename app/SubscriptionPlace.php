<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubscriptionPlace extends Model
{
    protected $fillable = [
        'name',
        'zipcode',
        'street',
        'city',
        'country',
        'neighborhood',
        'state',
        'number',
        'complement',
        'persons_qtd',
    ];
    protected $table = 'subscription_place';

    public function subscription() {
        return $this->belongsTo('App\Subscription');
    }
}
