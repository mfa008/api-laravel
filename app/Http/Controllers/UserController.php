<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        return response()->json([
            'status' => 200,
            'user' => $user
        ]);
    }

    public function login(Request $request)
    {
        try {
            if (auth()->attempt($request->only(['email', 'password']))) {
                $user = auth()->user();
                // dd($user);
                $token = $user->createToken('MFA_KEY')->plainTextToken;
                return response()->json([
                    'status' => 200,
                    'message' => 'user connecte ', 
                    'user '=> $user,
                    'token' => $token
                ]);
            } else {
                return response()->json([
                    'error' => 'Utilisateur not found'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'error' => $e
            ]);
        }
    }
}
