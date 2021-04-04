<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\Http\Requests\AuthRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Login;

class AuthController extends Controller
{

    /**
     * Login user and create token
     *
     * @param  AuthRequest $request
     * @return json $response
     */
    public function login(AuthRequest $request)
    {
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Invalid credentials',
                    'status' => 422
                ],
                422
            );
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;

        $token->save();

        $tokenInfo = [
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
        ];

        return response()->json(
            [
                'success' => true,
                'data' => $tokenInfo,
                'status' => 200
            ],
            200
        );
    }

    /**
     * Logout user (Revoke the token)
     *
     * @param null
     * @return string message
     */
    public function logout()
    {
        request()->user()->token()->revoke();
        return response()->json([
            'success' => true,
            'message' => 'Successfully logged out',
            'status' => 200
        ]);
    }
}
