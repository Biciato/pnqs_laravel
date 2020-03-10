<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;
use App\Http\Requests\StoreSubscription;

class SubscriptionController extends Controller
{
    public function index(Subscription $subscription) {
        if (auth()->user()->is_admin) {
            $subscriptions = $subscription->index()->get();
        } else {
            $subscriptions = auth()->user()->subscriptions()->index()->get();
        }
        return view('candidaturas.index', ['subscriptions' => $subscriptions]);
    }

    public function new() {
        return view('candidaturas.new');
    }

    public function show(Subscription $subscription) {
        return view('candidaturas.show', ['subscription' => $subscription->complete($subscription->id)->first()]);
    }

    public function store(Subscription $subscription, StoreSubscription $request) {
        $subscription->create($request->all());

        return 'success';
    }
}
