<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Requests\ResetPasswordRequest;
use Illuminate\Auth\Passwords\PasswordBroker;

class ResetPasswordController extends Controller
{
    protected $user, $passwordBroker;

    public function __construct(UserRepository $user, PasswordBroker $passwordBroker)
    {
        $this->passwordBroker = $passwordBroker;
        $this->user = $user;
    }

    public function updatePassword(ResetPasswordRequest $request)
    {
        $credentials =  $request->only('email', 'token');

        $userInfo = $this->passwordBroker->getUser($credentials);

        if (!$this->passwordBroker->tokenExists($userInfo, $credentials['token'])) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Link has expired. Try again',
                    'status' => 422
                ],
                422
            );
        }

        $update = $this->user->resetPassword($userInfo, $request->password);
        if ($update) {
            $this->passwordBroker->deleteToken($userInfo);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Password was reset successfully!',
                    'status' => 200
                ],
                200
            );
        }
    }
}
