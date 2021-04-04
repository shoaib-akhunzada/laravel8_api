<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Mail\AddUserEmail;
use App\Mail\UpdateUserEmail;
use Illuminate\Support\Facades\Mail;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\URL;

class UserController extends Controller
{
    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * Get all the users.
     *
     * @return json $response
     */
    public function index()
    {
        $users = $this->user->getAll();

        $statusCode = 200;
        $response = $this->user->parseResponse($users, $statusCode);

        return response()->json($response, $statusCode);
    }

    /**
     * Create User
     *
     * @param UserRequest $request
     * @return json response
     */
    public function signup(UserRequest $request)
    {
        $userInfo = $this->user->create($request);

        $statusCode = 200;
        $response = $this->user->parseResponse($userInfo, $statusCode);

        return response()->json($response, 201);
    }

    /**
     * Display user by passing id.
     *
     * @param  integer $id
     * @return json $response
     */
    public function show($id)
    {
        $user = $this->user->getById($id);

        $statusCode = 200;
        $response = $this->user->parseResponse($user, $statusCode);

        return response()->json($response, $statusCode);
    }

    /**
     * Add user
     *
     * @param  UserRequest $request
     * @return json $response
     */
    public function store(UserRequest $request)
    {
        $user = $this->user->create($request, true);

        $statusCode = 201;
        $response = $this->user->parseResponse($user, $statusCode);

        return response()->json($response, $statusCode);
    }

    /**
     * Update user
     *
     * @param  UserRequest $request
     * @param  integer $id
     * @return json $response
     */
    public function update(UserRequest $request, $id)
    {
        $user = $this->user->update($id, $request, true);

        $statusCode = 201;
        $response = $this->user->parseResponse($user, $statusCode);

        return response()->json($response, $statusCode);
    }


    /**
     * Delete user
     *
     * @param int $id
     * @return null
     */
    public function destroy($id)
    {
        $this->user->delete($id);

        return response()->json(null, 204);
    }
}
