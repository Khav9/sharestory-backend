<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|string|max:255',
            'password'  => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'User not found'
            ], 401);
        }

        $user   = User::where('email', $request->email)->firstOrFail();
        $user->last_login = now();
        $user->save();        
        $token  = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message'       => 'Login success',
            'access_token'  => $token,
            'token_type'    => 'Bearer'
        ]);
    }

    public function index(Request $request)
    {
        $user = $request->user();
        // $permissions = $user->getAllPermissions();
        // $roles = $user->getRoleNames();
        return response()->json([
            'message' => 'Login success',
            'data' => $user,
        ]);
    }

    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name'      => 'required|string|max:255',
            'email'     => 'required|string|email|max:255|unique:users',
            'password'  => 'required|string|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        try {
            $user = User::create([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => Hash::make($request->password),
                'role_id'   => 2
            ]);

            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message'       => 'Registration successful',
                'access_token'  => $token,
                'token_type'    => 'Bearer',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Registration failed',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    public function getUserAuth()
    {
        $user = Auth::user();
    
        if ($user->profile) {
            $user->profile = Storage::url($user->profile);
        }
    
        return response()->json($user);
    }
    
    public function logout(Request $request): JsonResponse
    {
        $user = $request->user();
        if ($user) {
            $user->tokens()->delete();
            return response()->json(['message' => 'Successfully logged out'], 200);
        }

        return response()->json(['message' => 'User not authenticated'], 401);
    }
}
