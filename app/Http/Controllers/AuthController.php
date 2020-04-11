<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use JWTAuth;
use App\User;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    public function Login(Request $request)
    {
       
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        $user = User::where('email', $request->email)->first();
        $user->token = $token;
        
        return response()->json($user);
    }

    public function Register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'phone' => 'required|unique:users'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        
        $user = User::create([
            'name' => $request->get('name'),
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'gender' => $request->get('gender'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone')
        ]);

        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        $user->token = $token;
        return response()->json($user);
    }

    public function AuthUser()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['user_not_found'], 404);
            }

        } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json(['token_expired'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json(['token_invalid'], $e->getStatusCode());

        } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

            return response()->json(['token_absent'], $e->getStatusCode());

        }

        return response()->json($user);
    }
    
}
