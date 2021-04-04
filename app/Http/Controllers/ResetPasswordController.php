<?php

namespace App\Http\Controllers;

use App\Models\User;
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

    public function index($token = false)
    {
        return view('reset_password.index', ['token' => $token]);
    }

    public function updatePassword(ResetPasswordRequest $request)
    {
        $credentials =  $request->only('email', 'token');

        $userInfo = $this->passwordBroker->getUser($credentials);

        if (!$this->passwordBroker->tokenExists($userInfo, $credentials['token'])) {
            return back()->with('error', 'Link has expired. Try again');
        }

        $update = $this->user->resetPassword($userInfo, $request->password);
        if ($update) {
            $this->passwordBroker->deleteToken($userInfo);

            event(new PasswordReset($userInfo));

            return back()->with('message', 'Password was reset successfully!');
        }

        return back()->with('error', 'Something going wrong!');
    }
}
