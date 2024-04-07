<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request)
    {
        try {
            $user = User::firstOrCreate([
                'email' => $request->email,
            ], [
                'name' => $request->name,
                'password' => Hash::make($request->password)
            ]);

            return responseJSON([
                'message' => 'User created successfully',
                'result' => [
                    'token' => $user->createToken("API TOKEN")->plainTextToken,
                    'user' => $user,
                ]
            ]);

        } catch (\Throwable $th) {
            return responseJSON([
                'code' => 500,
                'message' => $th->getMessage()
            ]);
        }
    }
}
