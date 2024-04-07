<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return responseJSON([
                'code' => 422,
                'message' => 'Password is incorrect',
                'errors' => ['password' => 'Password is incorrect']
            ]);
        }

        return responseJSON([
            'result' => [
                'token' => $user->createToken('apiToken')->plainTextToken,
                'user' => $user
            ]
        ]);
    }


    public function logout()
    {
        $auth = Auth::user()->currentAccessToken()->delete();
        return responseJSON([
            'code' => $auth ? 200 : 401,
            'message' => $auth ? 'Successfully disconnected' : 'Unable to disconnect'
        ]);
    }
}
