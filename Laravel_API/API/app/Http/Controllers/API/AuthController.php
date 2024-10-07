<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function signup(Request $request)
    {
        $validateUser = Validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required',
            ]
        );

        if ($validateUser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation Error',
                'errors' => $validateUser->errors()->all()
            ], 401);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User Created Successfully',
            'user' => $user
        ], 200);

        
    }

    public function login(Request $request)
    {
        // Step 1: Validate input
        $validateUser = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required',
            ]
        );

        // Step 2: If validation fails, return error response
        if ($validateUser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Authentication Failed',
                'errors' => $validateUser->errors()->all(),
            ], 404);
        }

        // Step 3: Attempt to log in with credentials
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $authUser = Auth::user();

            // Step 4: If successful, return token and user data
            return response()->json([
                'status' => true,
                'message' => 'User Logged in Successfully',
                'token' => $authUser->createToken("API TOKEN")->plainTextToken,
                'token_type' => 'bearer',
            ], 200);
        } else {
            // Step 5: If credentials do not match, return an error
            return response()->json([
                'status' => false,
                'message' => 'Email and PASSWORD DOES NOT MATCH',
            ], 401);
        }
    }

    public function logout(Request $request)
    {
        // Step 6: Log out by deleting the user's tokens
        $user = $request->user();
        $user->tokens()->delete();

        return response()->json([
            'status' => true,
            'user' => $user,
            'message' => 'You logged out Successfully',
        ], 200);
    }
}
