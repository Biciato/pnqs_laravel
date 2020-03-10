<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\ChangePassword;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePassword as CPR;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function changePassword(CPR $request) {
        $user = User::whereEmail($request->email)->whereCnpj($request->cnpj)->first();

        if ($user) {
            $user->update(['password' => bcrypt($request->password)]);
            ChangePassword::create([
                'ip' => $request->ip(),
                'email' => $request->email
            ]);

            return 'success';
        } else {
            return response()->json(['error' => 'no user found'], 422);
        }
    }
}
