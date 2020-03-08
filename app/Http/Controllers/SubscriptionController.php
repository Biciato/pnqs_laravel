<?php

namespace App\Http\Controllers;

use App\SubscriptionCategory;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index() {
        $subscriptions = auth()->user()->subscriptions()->index()->get();
        return view('candidaturas', ['subscriptions' => $subscriptions]);
    }
}
