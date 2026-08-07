<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;

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
    // Override the sendResetLinkFailedResponse method if needed
    protected function sendResetLinkFailedResponse(Request $request, $response)
    {
       // return redirect()->route('password.request')->with('error', trans($response));
       return response()->json(['message' => trans($response)], 400);
    }

    // Override the sendResetLinkResponse method if needed
    protected function sendResetLinkResponse(Request $request, $response)
    {
       // return redirect()->route('recovery')->with('status', trans($response));
       return response()->json(['message' =>  trans($response),'redirectURL' => route('login')], 200);
    }


    public function sendResetLinkEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $response = $this->broker()->sendResetLink(
            $request->only('email')
        );

        // Redirect based on the response from sending reset link
        return $response == Password::RESET_LINK_SENT
            ? $this->sendResetLinkResponse($request, $response)
            : $this->sendResetLinkFailedResponse($request, $response);
    }


}
