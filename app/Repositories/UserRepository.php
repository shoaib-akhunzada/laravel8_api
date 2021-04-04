<?php


namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserRepository
{
    public function getAll()
    {
        return User::orderBy('id', 'DESC')->paginate(15);
    }

    public function getById($id)
    {
        return User::findOrFail($id);
    }

    public function getByEmail($email)
    {
        return User::where('email', $email)->first();
    }

    public function create($request, $bind_role = false)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return $user;
    }

    public function update($id, $request, $bind_role = false)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return $user;
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return $user;
    }

    public function resetPassword($user, $password)
    {
        $user->password = bcrypt($password);

        return $user->save();
    }

    public function parseResponse($user, $statusCode)
    {

        if (!$user && empty($user)) {
            $response = [
                'message' => 'Data not found!',
                'success' => false,
                'data' => null,
                'status' => $statusCode
            ];
        } else {
            $response = [
                'success' => true,
                'data' => $user,
                'status' => $statusCode
            ];
        }

        return $response;
    }
}
