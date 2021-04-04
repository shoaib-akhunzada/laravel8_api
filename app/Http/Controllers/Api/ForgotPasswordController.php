<?php

namespace App\Http\Controllers\Api;

use App\Mail\ForgotPasswordEmail;
use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ForgotPasswordRequest;
use Illuminate\Auth\Passwords\PasswordBroker;
use Illuminate\Routing\UrlGenerator;

class ForgotPasswordController extends Controller
{
    protected $user, $url, $passwordBroker;

    public function __construct(UserRepository $user, PasswordBroker $passwordBroker, UrlGenerator $url)
    {
        $this->url = $url;
        $this->passwordBroker = $passwordBroker;
        $this->user = $user;
    }

    /**
     * Send reset password link.
     *
     * @param  ForgotPasswordRequest $request
     * @return json $response
     */

    public function forgotPassword(ForgotPasswordRequest $request)
    {
        $userInfo = $this->user->getByEmail($request->email);

        if ($userInfo && $request->email) {
            $result = $this->passwordBroker->createToken($userInfo);
            $passwordResetLink = $this->url->to('/reset-password/' . $result);

            Mail::to($userInfo->email)->send(new ForgotPasswordEmail($userInfo, $passwordResetLink));

            return response()->json(
                [
                    'success' => true,
                    'message' => 'We have sent your password reset link!',
                    'status' => 200
                ],
                200
            );
        }
    }
}
