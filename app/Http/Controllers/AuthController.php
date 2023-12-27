<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class AuthController extends Controller
{
    public function register(RegisterRequest $request)
    {
        $data = $request->validated();
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie('token', $token, 60 * 120);
        return response()->json([
            'status' => 200,
            'user' => new UserResource($user),
        ])->withCookie($cookie);

    }
    public function login(LoginRequest $request) {
        $data = $request->validated();

        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            return response()->json([
                'message' => 'Email or password is incorrect!'
            ], 401);
        }

        $token = $user->createToken('token')->plainTextToken;

        $cookie = cookie('token', $token, 60 * 120); // 1 day

        return response()->json([
            'status' => 200,
            'user' => new UserResource($user),
            'token' => $token,
        ])->withCookie($cookie);
    }
    public function logout(Request $request)
    {
        $token = $request->cookie()->currentAccessToken()->delete();
        $cookie = cookie()->forget('token');
        return response()->json([
            'status' => 200,
            'message' => 'Successfully logged out'
        ]);
    }
    public function user(Request $request)
    {
        return new AuthResource($request->user());
    }




}
