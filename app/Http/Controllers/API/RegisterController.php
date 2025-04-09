<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

class RegisterController extends BaseController
{
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(RegisterRequest $request): JsonResponse
    {
       $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password
       ]);




        $success['token'] =  $user->createToken('MyApp')->plainTextToken;


        return response()->json([
            'message' => 'User registered successfully',
            'data' => $user,
            'token' => $success
        ], 201);     }

    /**
     * Login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request): JsonResponse
    {
        if (Auth::attempt($request->only('email', 'password'))) 
            {

            $user = Auth::user();
            $success['token'] = $user->createToken('MyApp')->plainTextToken;
            $success['name'] = $user->name;

            return response()->json([
                'message' => 'User login successfully.',
                'data' => $success
            ], 200);
        } else {
            return response()->json([
                'error' => 'Unauthorized.',
                'message' => 'The provided credentials are incorrect.'
            ], 401);
        }
    }


    public function logout(Request $request): JsonResponse{
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'loggedout successfuly']);
    }
}
